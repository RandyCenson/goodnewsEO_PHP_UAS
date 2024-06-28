<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Mendefinisikan class PaketController yang merupakan controller
class PaketController extends Controller
{
    // Metode untuk menampilkan semua produk
    public function index()
    {
        $title = "Product"; // Menyimpan judul halaman
        $paket = Product::all(); // Mengambil semua data produk

        // Mengirim data ke view
        return view('partials.paket.index', compact("title", "paket"));
    }

    // Metode untuk mengambil data produk berdasarkan ID
    public function getProductData($id)
    {
        $product = Product::find($id); // Mencari produk berdasarkan ID

        return $product; // Mengembalikan data produk
    }

    // Metode untuk menampilkan form tambah produk
    public function addProductGet()
    {
        $title = "Add Product"; // Menyimpan judul halaman

        return view('partials.paket.add_paket', compact("title"));
        // Mengirim data ke view
        return view('/paket/add_product', compact("title"));
    }

    // Metode untuk menangani permintaan POST untuk menambah produk
    public function addProductPost(Request $request)
    {
        // Memvalidasi data yang dikirim dalam request
        $validatedData = $request->validate([
            "product_name" => "required|max:25",
            "stock" => "required|numeric|gt:0",
            "price" => "required|numeric|gt:0",
            "discount" => "required|numeric|gt:0|lt:100",
            "orientation" => "required",
            "description" => "required",
            "image" => "image|max:2048"
        ]);

        // Mengecek apakah ada file gambar yang diupload
        if (!isset($validatedData["image"])) {
            $validatedData["image"] = env("IMAGE_PRODUCT");
        } else {
            $validatedData["image"] = $request->file("image")->store("product", "public");
            
        }

        try {
            // Menyimpan data produk yang divalidasi ke database
            Product::create($validatedData);
            $message = "Product has been added!"; // Pesan sukses

            // Menampilkan pesan sukses menggunakan custom flasher
            myFlasherBuilder(message: $message, success: true);

            return redirect('/paket'); // Mengarahkan kembali ke halaman paket
        } catch (\Illuminate\Database\QueryException $exception) {
            return abort(500); // Mengembalikan halaman kesalahan 500 jika terjadi kesalahan
        }
    }

    // Metode untuk menampilkan form edit produk
    public function editProductGet(Product $product)
    {
        $data["title"] = "Edit Product"; // Menyimpan judul halaman
        $data["product"] = $product; // Menyimpan data produk

        // Mengirim data ke view
        return view("partials.paket.edit_paket", $data);
    }


    public function deleteProduct(Product $product){
        $paket = Product::findOrFail($product->id);
       
        $paket->delete();

        // return redirect('/paket')->with('success', 'Paket deleted successfully.');
    }

    // Metode untuk menangani permintaan POST untuk mengedit produk
    public function editProductPost(Request $request, Product $product)
    {
        // Mendefinisikan aturan validasi
        $rules = [
            'orientation' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
            'discount' => 'required|numeric|gt:0|lt:100',
            'image' => 'image|file|max:2048'
        ];

        // Mengecek apakah nama produk berubah
        if ($product->product_name != $request->product_name) {
            $rules['product_name'] = 'required|max:25|unique:products,product_name';
        } else {
            $rules['product_name'] = 'required|max:25';
        }

        // Memvalidasi data yang dikirim dalam request
        $validatedData = $request->validate($rules);

        try {
            // Jika ada file gambar yang diupload
            if ($request->file("image")) {
                // Menghapus gambar lama jika bukan gambar default
                if ($request->oldImage != env("IMAGE_PRODUCT")) {
                    Storage::delete($request->oldImage);
                }

                // Menyimpan gambar baru
                $validatedData["image"] = $request->file("image")->store("product", "public");
            }

            // Mengisi ulang data produk dengan data yang divalidasi
            $product->fill($validatedData);

            // Mengecek apakah ada perubahan pada data produk
            if ($product->isDirty()) {
                $product->save(); // Menyimpan perubahan

                $message = "Product has been updated!"; // Pesan sukses

                // Menampilkan pesan sukses menggunakan custom flasher
                myFlasherBuilder(message: $message, success: true);
                return redirect("/paket"); // Mengarahkan kembali ke halaman paket
            } else {
                $message = "Action <strong>failed</strong>, no changes detected!"; // Pesan gagal

                // Menampilkan pesan gagal menggunakan custom flasher
                myFlasherBuilder(message: $message, failed: true);
                return back(); // Mengarahkan kembali ke halaman sebelumnya
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            return abort(500); // Mengembalikan halaman kesalahan 500 jika terjadi kesalahan
        }
    }
}

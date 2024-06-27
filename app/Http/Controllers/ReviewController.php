<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\{User, Product, Review};

// Mendefinisikan class ReviewController yang merupakan controller
class ReviewController extends Controller
{
    // Metode untuk menampilkan ulasan produk
    public function productReview(User $user, Product $product)
    {
        $title = "Product Review"; // Menyimpan judul halaman
        $reviews = $product->review; // Mengambil semua ulasan untuk produk ini

        $user = auth()->user(); // Mengambil pengguna yang sedang login

        // Menghitung rating rata-rata produk
        if (count($reviews) == 0) {
            $rate = 0;
        } else {
            $rate = $reviews->sum("rating") / count($reviews);
        }

        // Mengecek apakah pengguna telah membeli dan mengulas produk ini
        $isPurchased = $this->isPurchased($user, $product);
        $isReviewed = $this->isReviewed($user, $product);

        // Menghitung jumlah ulasan berdasarkan rating bintang
        $starCounter = [];
        $sum = 0;
        for ($i = 1; $i <= 5; $i++) {
            $total = count(Review::where(["rating" => $i, "product_id" => $product->id])->get());
            array_push($starCounter, $total);
            $sum += $total;
        }

        // Mengirim data ke view
        return view("/review/product_review", compact("title", "reviews", "product", "rate", "isPurchased", "isReviewed", "starCounter", "sum"));
    }

    // Metode untuk menambahkan ulasan baru
    public function addReview(Request $request)
    {
        // Memvalidasi data yang dikirim dalam request
        $validatedData = $request->validate([
            "rating" => "required", // Rating wajib diisi
            "review" => "required" // Ulasan wajib diisi
        ]);

        // Menambahkan data tambahan ke array validasi
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["product_id"] = $request->product_id;
        $validatedData["is_edit"] = 0;

        // Membuat ulasan baru menggunakan data yang divalidasi
        Review::create($validatedData);

        $message = "Your review has been created!"; // Pesan sukses

        // Menampilkan pesan sukses menggunakan custom flasher
        myFlasherBuilder(message: $message, success: true);
        return back();
    }

    // Metode untuk mendapatkan data ulasan
    public function getDataReview(Review $review)
    {
        return $review; // Mengembalikan data ulasan
    }

    // Metode untuk mengedit ulasan
    public function editReview(Request $request, Review $review)
    {
        // Mengisi ulang ulasan dengan data baru
        $review->fill([
            'rating' => $request->rating,
            'review' => $request->review_edit,
            'is_edit' => 1,
        ]);

        // Mengecek apakah ada perubahan pada ulasan
        if ($review->isDirty()) {
            $review->save(); // Menyimpan perubahan

            $message = "Your review has been updated!"; // Pesan sukses

            // Menampilkan pesan sukses menggunakan custom flasher
            myFlasherBuilder(message: $message, success: true);
            return back();
        } else {
            $message = "Action failed, no changes detected!"; // Pesan gagal

            // Menampilkan pesan gagal menggunakan custom flasher
            myFlasherBuilder(message: $message, failed: true);
            return back();
        }
    }

    // Metode untuk menghapus ulasan
    public function deleteReview(Review $review)
    {
        $review->delete(); // Menghapus ulasan

        $message = "Your review has been deleted!"; // Pesan sukses

        // Menampilkan pesan sukses menggunakan custom flasher
        myFlasherBuilder(message: $message, success: true);
        return back();
    }

    // Metode private untuk mengecek apakah produk telah dibeli oleh pengguna
    private function isPurchased($user, $product)
    {
        $orders = Order::where(["user_id" => $user->id, "product_id" => $product->id, "is_done" => 1])->get();

        if (count($orders) > 0) {
            return 1; // Mengembalikan true jika produk telah dibeli
        }

        return 0; // Mengembalikan false jika produk belum dibeli
    }

    // Metode private untuk mengecek apakah produk telah diulas oleh pengguna
    private function isReviewed($user, $product)
    {
        $review = Review::where(["user_id" => $user->id, "product_id" => $product->id])->get();

        if (count($review) > 0) {
            return 1; // Mengembalikan true jika produk telah diulas
        }

        return 0; // Mengembalikan false jika produk belum diulas
    }
}

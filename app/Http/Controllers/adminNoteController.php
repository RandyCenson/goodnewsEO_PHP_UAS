<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini

use App\Models\AdminNote; // Mengimpor model AdminNote
use Illuminate\Http\Request; // Mengimpor class Request dari Laravel

// Mendefinisikan class AdminNoteController yang merupakan controller
class AdminNoteController extends Controller
{
    // Metode untuk menampilkan semua catatan (notes)
    public function index()
    {
        $notes = AdminNote::all(); // Mengambil semua catatan dari database
        $title = "Notes"; // Menyimpan judul halaman
        // dd($notes); // Menggunakan dd (dump and die) untuk debugging (dikomentari)
        return view('partials.home.home_admin', compact('notes', 'title')); // Mengirim data catatan dan judul ke view
    }

    // Metode untuk menyimpan catatan baru
    public function store(Request $request)
    {
        // Memvalidasi data yang dikirim dalam request
        $request->validate([
            'title' => 'required', // Judul wajib diisi
            'content' => 'required', // Konten wajib diisi
        ]);

        // Membuat catatan baru menggunakan data yang divalidasi
        AdminNote::create($request->all());
        // Mengarahkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Note created successfully.');
    }

    // Metode untuk menghapus catatan
    public function destroy(AdminNote $note)
    {
        $note->delete(); // Menghapus catatan yang diberikan
        // Mengarahkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Note deleted successfully.');
    }
}

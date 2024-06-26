<?php

// app/Http/Controllers/AdminDashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function settings()
    {
        return view('admin.dashboard.settings');
    }

    public function updateColor(Request $request)
    {
        // Simpan pengaturan warna dalam session untuk tujuan demonstrasi
        session([
            'primary_color' => $request->primary_color,
            'secondary_color' => $request->secondary_color,
        ]);

        return redirect()->route('admin.dashboard.settings')->with('success', 'Color settings updated successfully.');
    }

    public function storeNote(Request $request)
    {
        // Validasi dan simpan catatan baru
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        Note::create($validatedData);

        return redirect()->route('admin.dashboard.index')->with('success', 'Note created successfully.');
    }

    public function destroyNote($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('admin.dashboard.index')->with('success', 'Note deleted successfully.');
    }
}

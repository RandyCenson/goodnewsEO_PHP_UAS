<?php

namespace App\Http\Controllers;

use App\Models\AdminNote;
use Illuminate\Http\Request;

class AdminNoteController extends Controller
{
    public function index()
    {
        $notes = AdminNote::all();
        $title = "Notes";
        // dd($notes);
        return view('partials.home.home_admin', compact('notes','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        AdminNote::create($request->all());
        return redirect()->back()->with('success', 'Note created successfully.');
    }

    public function destroy(AdminNote $note)
    {
        $note->delete();
        return redirect()->back()->with('success', 'Note deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\galleryImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class galleryController extends Controller
{

    public function index()
    {
        $title = "Galleries";
        $images = [
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            'images\home_cust\template2.jpg',
            
        ];

        // $images = User::all();
        
        return view('/gallery', compact('title','images'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('storage', 'public');

        galleryImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect('/gallery')->with('success', 'Photo uploaded successfully.');
    }


    public function destroy(galleryImage $photo)
    {
        // Hapus file gambar dari storage
        Storage::disk('public')->delete($photo->image_path);

        // Hapus record dari database
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully.');
    }
}
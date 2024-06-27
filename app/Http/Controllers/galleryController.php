<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class galleryController extends Controller
{

    public function generate_gallery()
    {
        $title = "Galleries";
        // $images = [
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
        //     'images\home_cust\template2.jpg',
            
        // ];
        
        return view('/gallery', compact('title','images'));
    }
}

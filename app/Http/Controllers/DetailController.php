<?php

namespace App\Http\Controllers;
//model detail



use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index()
    {
        return view("index");
    }
    public function productDetail(Request $request){
        return view("index");
    }
}

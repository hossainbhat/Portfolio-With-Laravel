<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        
        return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
    }


    public function portfolio(){
        return view('frontend.portfolio');
    }


    public function contact(){
        return view('frontend.contact');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function blogdetails(){
        return view('frontend.blog-details');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testmonial;
use Image;

class TestmonialController extends Controller
{
    public function testmonials(){
        return view('admin.testmonial.testmonials');
    }
    public function addEditTestminial(){
        return view('admin.testmonial.addEditTestmonial');
    }
    public function deleteTestmonial(){
        
    }
    public function updateTestmonialStatus(){
        
    }
}

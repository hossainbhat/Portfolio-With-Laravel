<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Image;

class LogoController extends Controller
{
    public function logos(){
        return view('admin.logo.logos');
    }
    public function addEditLogo(){
        return view('admin.logo.addEditlogo');
    }
    public function deleteLogo(){
        
    }
    public function updateLogoStatus(){
        
    }
}

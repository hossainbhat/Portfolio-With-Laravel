<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function services(){
        return view('admin.service.services');
    }
    public function addEditService(){
        return view('admin.service.addEditservice');
    }
    public function deleteService(){
        
    }
    public function updateServiceStatus(){
        
    }
}

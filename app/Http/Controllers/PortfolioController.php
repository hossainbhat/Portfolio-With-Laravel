<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Porfolio;
use Image;

class PortfolioController extends Controller
{
    public function porfolios(){
        return view('admin.porfolio.porfolios');
    }

    public function addEditPorfolio(){
        return view('admin.porfolio.addEditPorfolio');
    }
    public function deletePortfolio(){
        
    }
    public function updatePorfolioStatus(){
        
    }
}

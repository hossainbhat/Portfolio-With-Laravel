<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts(){
        return view('admin.contact.contacts');
    }
    public function viewContact($id){
        return view('admin.contact.view-contact');
    }
    public function deleteContact($id){
        
    }
    public function updateContactStatus(){
        
    }
}

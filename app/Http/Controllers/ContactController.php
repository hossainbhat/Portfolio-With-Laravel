<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts(){
        $contacts = Contact::latest()->get();
        return view('admin.contact.contacts',compact('contacts'));
    }
    public function viewContact($id){
        return view('admin.contact.view-contact');
    }
    public function deleteContact($id){
        Contact::where('id',$id)->delete();
        toastr()->success('contacts has been deleted Successfully');
        return redirect("admin/contacts");
    }
    public function updateContactStatus(){
        
    }
}

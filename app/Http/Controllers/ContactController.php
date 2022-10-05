<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    //get email contact
    public function contacts(){
        Session::put('page','contact');
        $unseenContacts = Contact::where('status',0 )->latest()->get();
        $seenContacts   = Contact::where('status',1)->latest()->get();
        return view('admin.contact.contacts',compact('unseenContacts','seenContacts'));
    }
    //email details view
    public function viewContact($id){
        Session::put('page','contact');
        Contact::where('id',$id)->update(['status'=>1]);
        $contact = Contact::find($id);
        return view('admin.contact.view-contact')->with(compact('contact'));
    }
    //delete email contact
    public function deleteContact($id){
        Contact::where('id',$id)->delete();
        toastr()->success('contacts has been deleted Successfully');
        return redirect("admin/contacts");
    }
 
}

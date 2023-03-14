<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Mail\Mailables\Content;

class ContactController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $contacts = new Contact;
            $limit = 10;
            $offset = 0;
            $search = [];
            $where = [];
            $with = [];
            $join = [];
            $orderBy = [];

            if($request->input('length')){
                $limit = $request->input('length');
            }

            if ($request->input('order')[0]['column'] != 0) {
                $column_name = $request->input('columns')[$request->input('order')[0]['column']]['name'];
                $sort = $request->input('order')[0]['dir'];
                $orderBy[$column_name] = $sort;
            }

            if($request->input('start')){
                $offset = $request->input('start');
            }

            if($request->input('search') && $request->input('search')['value'] != ""){
                $search['email'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $contacts = $contacts->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($contacts);
        }
        return view("backend.contact.index");
    }

    public function show($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function replay($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back();
     }

     public function replayStore(Request $request){
        if($request->isMethod('post')){
            // dd($request->all());
            $email  = $request->email;
            $name   = auth()->user()->name;
            $messageData =[
                'email'     =>auth()->user()->email,
                'userName'  =>$name,
                'name'      =>$request->name,
                'subject'   =>$request->subject,
                'content'   =>$request->content,
            ];
            Mail::send('Mail.replay_email',$messageData,function($message) use ($email){
                $message ->to($email)->subject('Replay From Md Hossain Bhat');
            });

        }
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Testmonial;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Logo;
use App\Models\User;
use App\Models\Skill;

class IndexController extends Controller
{
    public function index(){
        $user           = User::first();
        $skills         = Skill::where('status',1)->latest()->get();
        $services       = Service::where('status',1)->latest()->get();
        $testmonials    = Testmonial::where('status',1)->latest()->get();
        $portfolios     = Portfolio::where('status',1)->latest()->get();
        $logos          = Logo::where('status',1)->latest()->get();
        return view('index')->with(compact('user','skills','services','logos','testmonials','portfolios'));
    }

    public function indexContact(Request $request){
        if($request ->isMethod('post')){
            $data = $request->all();
            //  echo "<pre>"; print_r($data); die;
            $rulse = [
                'name'      => 'required',
                'subject'   => 'required',
                'email'     => 'required|email',
                'message'   => 'required',
            ];
    
            $customMessage = [
                'name.required'     =>'name is required',
                'subject.required'  =>'subject is required',
                'email.required'    =>'email is required',
                'email.email'       =>'valid email is required',
                'message.required'  =>'message is required',
            ];
    
            $this->validate($request,$rulse,$customMessage);
    
                $send           = new Contact;
                $send->name     = $data['name'];
                $send->subject  = $data['subject'];
                $send->email    = $data['email'];
                $send->message  = $data['message'];
                $send->status  = 0;
                $send->save();
    
                // Send Contact Email
                $email = "hossainbhatcse@gmail.com";
                $messageData = [
                    'name'      =>$data['name'],
                    'subject'   =>$data['subject'],
                    'email'     =>$data['email'],
                    'comment'   =>$data['message']
                ];
                Mail::send('email.enquiry',$messageData,function($message)use($email){
                    $message->to($email)->subject('Enquiry from Md Hossain Bhat');
                });
            
            }
            toastr()->success('Your Message send has been Successfull');
            return redirect()->back();
    }
}

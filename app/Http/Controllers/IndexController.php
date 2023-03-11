<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use App\Models\Portfolio;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(){
        $data['user'] = User::first();
        return view('frontend.index',$data);
    }

    public function about(){
        $data['setting'] = SiteSetting::first();
        $data['user'] = User::first();
        $data['skills'] = Skill::where(['status'=>1])->get();
        $data['education'] = Education::where(['status'=>1])->get();
        $data['experiences'] = Experience::where(['status'=>1])->get();
        return view('frontend.about',$data);
    }


    public function portfolio(){
        $data['portfolios'] = Portfolio::latest()->get();
        return view('frontend.portfolio',$data);
    }


    public function contact(){
        $setting = SiteSetting::select('id','email','description','mobile','facebook','twitter','youtube','github')->first();
        return view('frontend.contact',compact('setting'));
    }

    public function blog(){
        $data['blogs'] = Blog::latest()->limit(1)->paginate(6);
        return view('frontend.blog',$data);
    }

    public function blogdetails(Blog $blog){
        $blog = $blog->find($blog->id);
        return view('frontend.blog-details',compact('blog'));
    }

    public function store(Request $request){
        // dd($request->all());
        $rulse = [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'content' => 'required',
        ];

        $customMessage = [
            'name.required' =>'Name is required',
            'email.required' =>'Email is required',
            'email.email' =>'Valid Eamil is required',
            'subject.required' =>'Subject is required',
            'content.required' =>'Message is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){
            $contact = new Contact;
            $contact->name    = $request->name;
            $contact->email   = $request->email;
            $contact->subject = $request->subject;
            $contact->content = $request->content;
            $contact->save();

            // Send Contact Email
            $email = "hossainbhatcse@gmail.com";
            $messageData = [
                'name'      =>$request['name'],
                'subject'   =>$request['subject'],
                'email'     =>$request['email'],
                'comment'   =>$request['content']
            ];
            Mail::send('Mail.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject('Enquiry from Md Hossain Bhat Portfolio');
            });
        }
        return redirect()->back();
    }
}

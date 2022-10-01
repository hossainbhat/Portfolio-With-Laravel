<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Session;
use Image;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();
            // echo "<pre>"; print_r($data); die;
    		$rulse = [
    			'email' => 'required|email|max:255',
		        'password' => 'required|min:6',
    		];

    		$customMessage = [
    			'email.required' =>'Email is required',
    			'email.email' =>'Valid Email is password',
    			'password.required' =>'password is required',
    		];

    		$this->validate($request,$rulse,$customMessage);

    		if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
    			return redirect('admin/dashboard');
    		}else{
    			
                toastr()->error('Invalide Email or Password');
    			return redirect()->back();
    		}
    	}
        return view('admin.login');
    }
    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount ==0){
                toastr()->error('Email does not exist');
            }
            $random_password = Str::random(8);
            $new_password = bcrypt($random_password);
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            $userName= User ::select('name')->where('email',$data['email'])->first();
            $email  = $data['email'];
            $name   = $userName->name;
            $messageData =[
                'email'     =>$email,
                'name'      =>$name,
                'password'  => $random_password
            ];
            Mail::send('email.forgot_password',$messageData,function($message) use ($email){
                $message ->to($email)->subject('Your Recovery Password');
            });

            toastr()->success('please check your email for new password');
        }
        return view('admin.forgot_password');
    }
 
    public function dashboard(){
       
        return view('admin.dashboard');
    }
    public function profile(){
        return view("admin.profile");
    }
    public function updateProfile(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required|string',
                'phone' => 'required|numeric',
                'title' => 'required',
                'designation' => 'required',
                'bio' => 'required',
                'location' => 'required',
                'phone' => 'required',
                'facebook' => 'required',
                'linkdin' => 'required',
                'twitter' => 'required',
                'github' => 'required',
                'image' => 'required',
                'cv' => 'required',
            ];

            $customMessage = [
                'image.required' =>'Profile Image is required',
                'cv.required' =>'Your CV is required',
                'name.required' =>'Name is required',
                'title.required' =>'Title is required',
                'designation.required' =>'Designation is required',
                'bio.required' =>'Bio is required',
                'location.required' =>'Location is required',
                'phone.required' =>'Phone is required',
                'facebook.required' =>'Facebook is required',
                'linkdin.required' =>'Linkdin is required',
                'twitter.required' =>'Twitter is required',
                'github.required' =>'Github is required',
                'phone.required' =>'Mobile is required',
                'phone.numeric' =>'Valid Mobile is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'uploads/images/profile/'.$imageName;
                    Image::make($image_temp)->resize(150,150)->save($imagePath);
                }
            }else if (!empty($data['image'])){
                $imagePath = $data['image'];
            }else{
                $imagePath = "";
            }

            if($request->file('cv')) {
                $file = $request->file('cv');
                $filename = time().'_'.$file->getClientOriginalName();
                // File upload location
                $location = 'uploads/cv/';
                // Upload file
                $file = $file->move($location,$filename);
             }else if (!empty($data['cv'])){
                $file = $data['cv'];
            }else{
                $file = "";
            }

            User::where('email',Auth::user()->email)->update(['name'=>$data['name'],'phone'=>$data['phone'],'title'=>$data['title'],'designation'=>$data['designation'],'bio'=>$data['bio'],'location'=>$data['location'],'facebook'=>$data['facebook'],'linkdin'=>$data['linkdin'],'twitter'=>$data['twitter'],'github'=>$data['github'],'image'=>$imagePath,'cv'=>$file]);
            toastr()->success('Your profile has been updated Successfull');
            return redirect()->back();
        }
        return view("admin.edit-profile");
    }

    public function deleteProfileImage($id){
        $profileImage = User::select('image')->where('id',$id)->first();

        if (file_exists($profileImage->image)) {
            unlink($profileImage->image);
        }
        User::where('id',$id)->update(['image'=>'']);

        toastr()->success("Profile Image has been deleted Successfully!");
        return redirect()->back();
    }

    public function deleteProfileCV($id){
        $profileImage = User::select('cv')->where('id',$id)->first();

        if (file_exists($profileImage->image)) {
            unlink($profileImage->image);
        }
        User::where('id',$id)->update(['cv'=>'']);

        toastr()->success("Your CV has been deleted Successfully!");
        return redirect()->back();
    }

    public function chkPassword(Request $request){

        $data = $request->all();
        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];
        
        if(Hash::check($current_password,Auth::user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }
    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(Hash::check($data['current_pwd'],Auth::user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    toastr()->success('Password has been updated Successfully');
                }else{
                   toastr()->error('new Password & confirm password not match');
                }

            }else {
                toastr()->error('Incorrect Current Password!');
            }
           return redirect()->back();
      }
    }

    public function logout(){
        Auth::logout();
    	return redirect('/admin');
    }
}

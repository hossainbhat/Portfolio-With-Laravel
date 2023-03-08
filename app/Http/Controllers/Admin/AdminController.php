<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Skill;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function login(Request $request){
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }
        if ($request->isMethod('post')) {
    		$data = $request->all();
            // echo "<pre>"; print_r($data); die;

    		if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                toastr()->success('Successfully Loged In');
    			return response()->json(['success'=>'Successfully Loged In']);
    		}else{
    			return response()->json(['error'=>'Something Went to Rong']);
    		}
    	}
        return view('backend.auth.login');
    }
    public function forgotpassword(){
        
        return view('backend.auth.forgotpassword');
    }

    public function dashboard(){

        $data['skill'] = Skill::count();
        $data['portfolio'] = Portfolio::count();
        $data['contact'] = Contact::count();
        $data['blog'] = Blog::count();
        $data['contacts'] = Contact::latest()->get();
        return view('backend.dashboard',$data);
    }

    public function profile(Request $request){
        if($request->isMethod("post")){
            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'assets/uploads/profile/'.$imageName;
                    Image::make($image_temp)->resize(746, 1020)->save($imagePath);

               }
            }else if($request->user_id) {
                $user = User::where('id', $request->user_id)->select('id', 'image')->first();
                $imagePath = $user->image;
            } else {
                $imagePath = '';
            }

            if($request->file('upload_cv')){
                $file = $request->file('upload_cv');
                $filename = time() . '.' . $request->file('upload_cv')->extension();
                $filePath = 'assets/uploads/profile/';
                // $filePath = public_path() . '/uploads/profile/';
                $filePath = $file->move($filePath, $filename);
            }else if($request->user_id) {
                $user = User::where('id', $request->user_id)->select('id', 'upload_cv')->first();
                $filePath = $user->upload_cv;
            } else {
                $filePath = '';
            }

            $user              = User::first();
            $user->name        = $request->name;
            $user->address     = $request->address;
            $user->designation = $request->designation;
            $user->mobile      = $request->mobile;
            $user->skype       = $request->skype;
            $user->age         = $request->age;
            $user->nationality = $request->nationality;
            $user->freelance   = $request->freelance;
            $user->description = $request->description;
            $user->upload_cv   = $filePath;
            $user->image       = $imagePath;
            $user->update();

            return response()->json($user);
        }
        return view("backend.profile");
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->input();
            if(Hash::check($data['current_pwd'],Auth::user()->password)){
                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',auth()->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    
                    return response()->json([
                        'status'    =>true,
                        'message'   =>"Password has been updated Successfully",
                    ],200);
                }else{
                    return response()->json([
                        "status"    =>false,
                        "message"   =>"new Password & confirm password not match!",
                    ],422);
                }
            }else{
                return response()->json([
                    "status"    =>false,
                    "message"   =>"Incorrect Current Password!",
                ],422);
            }
        }
    }
    
    public function logout(){
        Auth::logout();
    	return redirect()->route('admin.login');
    }

}

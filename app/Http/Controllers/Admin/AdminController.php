<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('backend.dashboard');
    }

    public function logout(){
        Auth::logout();
    	return redirect()->route('admin.login');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Session;
use Image;

class LogoController extends Controller
{
    //get logo
    public function logos(){
        Session::put('page','logo');
        $logos = Logo::latest()->get();
        return view('admin.logo.logos',compact('logos'));
    }
    //add edit logo
    public function addEditLogo(Request $request, $id=null){
    	if ($id=="") {
            Session::put('page','addLogo');
            $name ="Add Logo";
            $logo = new Logo;
            $logodata = array();
            $message ="Logo Add Successfully!";
        }else{
            Session::put('page','editLogo');
            $name ="Edit Logo";
            $logodata = Logo::where('id',$id)->first();

            $logo = Logo::find($id);
            $message ="Logo Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'image' => 'image',
            ];

            $customMessage = [
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'uploads/images/logo/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $logo->image = $imagePath;
               }
            }
            $logo->status = 1;
            $logo->save();

            toastr()->success($message);
            return redirect("admin/logos");
        }
       
        return view('admin.logo.addEditlogo')->with(compact('name','logodata'));
    }
    //delete logo
    public function deleteLogo($id){
        $logoImage = Logo::select('image')->where('id',$id)->first();

        if (file_exists($logoImage->image)) {
            unlink($logoImage->image);
        }
        Logo::where('id',$id)->delete();
        toastr()->success('Logo has been deleted Successfully');
        return redirect()->back();
    }
    //delete logo image
    public function deleteLogoImage($id){
        $logoImage = Logo::select('image')->where('id',$id)->first();

        if (file_exists($logoImage->image)) {
            unlink($logoImage->image);
        }
        Logo::where('id',$id)->update(['image'=>'']);

        toastr()->success("Logo Image has been deleted Successfully!");
        return redirect()->back();
    }
    //logo status update
    public function updateLogoStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Logo::where('id',$data['logo_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'logo_id'=>$data['logo_id']]);
        }
    }
}

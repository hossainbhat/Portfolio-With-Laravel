<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testmonial;
use Session;
use Image;

class TestmonialController extends Controller
{
    //get testmonial
    public function testmonials(){
        Session::put('page','testimonial');
        $testmonials = Testmonial::latest()->get();
        return view('admin.testmonial.testmonials',compact('testmonials'));
    }
    //add edit testimonial
    public function addEditTestminial(Request $request, $id=null){
        if ($id=="") {
            Session::put('page','addTestimonial');
            $name ="Add Testmonial";
            $testmonial = new Testmonial;
            $testmonialdata = array();
            $message ="Portfolio Add Successfully!";
        }else{
            Session::put('page','editTestimonial');
            $name ="Edit Testmonial";
            $testmonialdata = Testmonial::where('id',$id)->first();

            $testmonial = Testmonial::find($id);
            $message ="Testmonial Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name'      => 'required',
                'company'   => 'required',
                'image'     => 'image',
            ];

            $customMessage = [
                'name.required'     =>'name is required',
                'company.required'  =>'company is required',
                'image.image'       =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'uploads/images/testmonial/'.$imageName;
                    Image::make($image_temp)->resize(512,512)->save($imagePath);
                    $testmonial->image = $imagePath;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }

            $testmonial->name           = $data['name'];
            $testmonial->company        = $data['company'];
            $testmonial->description    = $data['description'];
            $testmonial->status         = 1;
            $testmonial->save();

            toastr()->success($message);
            return redirect("admin/testmonials");
        }
        return view('admin.testmonial.addEditTestmonial')->with(compact('name','testmonialdata'));
    }
    //delete testmonial
    public function deleteTestmonial($id){
        $portfolioImage = Testmonial::select('image')->where('id',$id)->first();

        if (file_exists($portfolioImage->image)) {
            unlink($portfolioImage->image);
        }

        Testmonial::where('id',$id)->delete();
        toastr()->success('Testmonial has been deleted Successfully');
        return redirect("admin/testmonials");
    }
    //delete testimonial image
    public function deleteTestmonialImage($id){
        $portfolioImage = Testmonial::select('image')->where('id',$id)->first();

        if (file_exists($portfolioImage->image)) {
            unlink($portfolioImage->image);
        }
        Testmonial::where('id',$id)->update(['image'=>'']);

        toastr()->success("Testmonial Image has been deleted Successfully!");
        return redirect()->back();
    }
    //testimonial status update
    public function updateTestmonialStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Testmonial::where('id',$data['testmonial_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'testmonial_id'=>$data['testmonial_id']]);
        }
    }
}

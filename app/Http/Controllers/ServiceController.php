<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Session;

class ServiceController extends Controller
{
    //get service
    public function services(){
        Session::put('page','service');
        $services = Service::latest()->get();
        return view('admin.service.services')->with(compact('services'));
    }
    //add edit service
    public function addEditService(Request $request, $id=null){
        if ($id=="") {
            Session::put('page','addService');
            $name ="Add Service";
            $service       = new Service;
            $servicedata   = array();
            $message     ="Service Add Successfully!";
     }else{
            Session::put('page','editService');
            $name ="Edit Service";
            $servicedata = Service::where('id',$id)->first();
 
            $service   = Service::find($id);
            $message ="Service Update Successfully!";
     }
     if ($request->isMethod('post')) {
            $data = $request->all();
         //    echo "<pre>"; print_r($data); die;
            $rulse = [
                'title'       => 'required',
                'description' => 'required',
            ];
 
            $customMessage = [
                'title.required'        =>'Title is required',
                'description.required'  =>'Description is required',
            ];
 
            $this->validate($request,$rulse,$customMessage);
 
 
            $service->title        = $data['title'];
            $service->description  = $data['description'];
            $service->status       = 1;
            $service->save();
 
            toastr()->success($message);
            return redirect("admin/services");
     }
        return view('admin.service.addEditservice')->with(compact('name','servicedata'));
    }
    //delete service
    public function deleteService($id){
        Service::where('id',$id)->delete();
        toastr()->success('Service has been deleted Successfully');
        return redirect("admin/services");
    }
    //service status update
    public function updateServiceStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Service::where('id',$data['service_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'service_id'=>$data['service_id']]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $experiences = new Experience;
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
                $search['designation'] = $request->input('search')['value'];
                $search['company_name'] = $request->input('search')['value'];
                $search['passing_year'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $experiences = $experiences->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($experiences);
        }
        return view("backend.experience.index");
    }

    public function show(Experience $experience){

        return response()->json($experience);
    }

    public function store(Request $request){
        $rulse = [
            'designation' => 'required',
            'company_name' => 'required',
            'passing_year' => 'required'
        ];

        $customMessage = [
            'designation.required' =>'Designation is required',
            'company_name.required' =>'Company Name is required',
            'passing_year.required' =>'Year is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $experience = new Experience;
            $experience->designation = $request->designation;
            $experience->company_name = $request->company_name;
            $experience->passing_year = $request->passing_year;
            $experience->description = $request->description;
            $experience->save();
        }
      
    }

    public function edit(Experience $experience){

        return response()->json($experience);
    }

    public function update(Request $request, Experience $experience){
        $rulse = [
            'designation' => 'required',
            'company_name' => 'required',
            'passing_year' => 'required'
        ];

        $customMessage = [
            'designation.required' =>'Designation is required',
            'company_name.required' =>'Company Name is required',
            'passing_year.required' =>'Year is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $experience = $experience->find($experience->id);
            $experience->designation = $request->designation;
            $experience->company_name = $request->company_name;
            $experience->passing_year = $request->passing_year;
            $experience->description = $request->description;
            $experience->update();
        }
        return redirect()->back();
    }

    public function destroy(Experience $experience){

       $experience->delete();
       return redirect()->back();
    }

    public function updateExperienceStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Experience::where('id',$data['experience_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'experience_id'=>$data['experience_id']]);
    	}
    }
}

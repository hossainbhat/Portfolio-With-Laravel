<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $educations = new Education;
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
                $search['degree_name'] = $request->input('search')['value'];
                $search['school_name'] = $request->input('search')['value'];
                $search['passing_year'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $educations = $educations->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($educations);
        }
        return view("backend.education.index");
    }

    public function show(Education $education){

        return response()->json($education);
    }

    public function store(Request $request){
        $rulse = [
            'degree_name' => 'required',
            'school_name' => 'required',
            'passing_year' => 'required'
        ];

        $customMessage = [
            'degree_name.required' =>'Degree name is required',
            'school_name.required' =>'Sscool Name is required',
            'passing_year.required' =>'Year is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $education = new Education;
            $education->degree_name = $request->degree_name;
            $education->school_name = $request->school_name;
            $education->passing_year = $request->passing_year;
            $education->description = $request->description;
            $education->save();
        }
      
    }

    public function edit(Education $education){

        return response()->json($education);
    }

    public function update(Request $request, Education $education){
        $rulse = [
            'degree_name' => 'required',
            'school_name' => 'required',
            'passing_year' => 'required'
        ];

        $customMessage = [
            'degree_name.required' =>'Degree name is required',
            'school_name.required' =>'Sscool Name is required',
            'passing_year.required' =>'Year is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $education = $education->find($education->id);
            $education->degree_name = $request->degree_name;
            $education->school_name = $request->school_name;
            $education->passing_year = $request->passing_year;
            $education->description = $request->description;
            $education->update();
        }
        return redirect()->back();
    }

    public function destroy(Education $education){

       $education->delete();
       return redirect()->back();
    }

    public function updateSkillStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Education::where('id',$data['education_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'education_id'=>$data['education_id']]);
    	}
    }
}

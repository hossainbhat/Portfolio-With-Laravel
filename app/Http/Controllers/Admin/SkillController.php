<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $skills = new Skill();
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
                $search['title'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $skills = $skills->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($skills);
        }
        return view("backend.skill.index");
    }

    public function show(Skill $skill){

        return response()->json($skill);
    }

    public function store(Request $request){
        $rulse = [
            'title' => 'required',
            'percentage' => 'required',
        ];

        $customMessage = [
            'title.required' =>'Title is required',
            'percentage.required' =>'Percentage is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $skill = new Skill;
            $skill->title = $request->title;
            $skill->percentage = $request->percentage;
            $skill->save();
        }
      
    }

    public function edit(Skill $skill){

        return response()->json($skill);
    }

    public function update(Request $request, Skill $skill){
        $rulse = [
            'title' => 'required',
            'percentage' => 'required',
        ];

        $customMessage = [
            'title.required' =>'Title is required',
            'percentage.required' =>'Percentage is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            $skill = $skill->find($skill->id);
            $skill->title = $request->title;
            $skill->percentage = $request->percentage;
            $skill->update();
        }
        return redirect()->back();
    }

    public function destroy(Skill $skill){

       $skill->delete();
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
    		Skill::where('id',$data['skill_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'skill_id'=>$data['skill_id']]);
    	}
    }

}

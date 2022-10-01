<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Session;

class SkillController extends Controller
{
    public function skills(){
        $skills = Skill::latest()->get();
        return view('admin.skill.skills')->with(compact('skills'));
    }
    public function addEditSkill(Request $request,$id=null){
        if ($id=="") {
               $name        ="Add Skill";
               $skill       = new Skill;
               $skilldata   = array();
               $getskills   = array();
               $message     ="Skill Add Successfully!";
        }else{
               $name ="Edit Skill";
               $skilldata = Skill::where('id',$id)->first();
               $getskills = Skill::get();
    
               $skill   = Skill::find($id);
               $message ="Skill Update Successfully!";
        }
        if ($request->isMethod('post')) {
               $data = $request->all();
            //    echo "<pre>"; print_r($data); die;
               $rulse = [
                   'title'       => 'required',
                   'persent'    => 'required',
               ];
    
               $customMessage = [
                   'title.required'      =>'Title is required',
                   'persent.required'   =>'Persent is required',
               ];
    
               $this->validate($request,$rulse,$customMessage);
    
    
               $skill->title     = $data['title'];
               $skill->persent  = $data['persent'];
               $skill->status   = 1;
               $skill->save();
    
               toastr()->success($message);
               return redirect("admin/skills");
        }
        return view('admin.skill.addEditSkill')->with(compact('name','skilldata','getskills'));
    }



    public function deleteSkill($id){
        Skill::where('id',$id)->delete();
        toastr()->success('Skill has been deleted Successfully');
        return redirect("admin/skills");
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

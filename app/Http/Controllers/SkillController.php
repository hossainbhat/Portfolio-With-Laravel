<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Session;

class SkillController extends Controller
{
    public function skills(){
        return view('admin.skill.skills');
    }
    public function addEditSkill(){
        return view('admin.skill.addEditSkill');
    }
    public function deleteSkill(){
        
    }
    public function updateSkillStatus(){
        
    }
}

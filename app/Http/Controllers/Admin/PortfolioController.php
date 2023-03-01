<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;

class PortfolioController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $portfolios = new Portfolio;
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
                $search['project_link'] = $request->input('search')['value'];
            }

            if($request->input('where')){
                $where = $request->input('where');
            }

            $portfolios = $portfolios->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($portfolios);
        }
        return view("backend.portfolio.index");
    }

    public function show(Portfolio $portfolio){

        return response()->json($portfolio);
    }

    public function store(Request $request){
        // dd($request->all());
        $rulse = [
            'title' => 'required',
            'project_type' => 'required',
            'project_link' => 'required'
        ];

        $customMessage = [
            'title.required' =>'title is required',
            'project_type.required' =>'Project type is required',
            'project_link.required' =>'Project link is required',
        ];

        $this->validate($request,$rulse,$customMessage);

      
        if($request->isMethod("post")){

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'assets/uploads/portfolio/'.$imageName;
                    Image::make($image_temp)->resize(300, 300)->save($imagePath);

               }
            }
            $portfolio = new Portfolio;
            $portfolio->title = $request->title;
            $portfolio->client_name = $request->client_name;
            $portfolio->langages = $request->langages;
            $portfolio->project_type = $request->project_type;
            $portfolio->project_link = $request->project_link;
            $portfolio->image = $imagePath;
            $portfolio->save();
        }
      
    }

    public function edit(Portfolio $portfolio){

        return response()->json($portfolio);
    }

    public function update(Request $request, Portfolio $portfolio){
        $rulse = [
            'title' => 'required',
            'project_type' => 'required',
            'project_link' => 'required'
        ];

        $customMessage = [
            'title.required' =>'title is required',
            'project_type.required' =>'Project type is required',
            'project_link.required' =>'Project link is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        if($request->isMethod("post")){

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'assets/uploads/portfolio/'.$imageName;
                    Image::make($image_temp)->resize(300, 300)->save($imagePath);

               }
            }elseif($portfolio->id){
                $portfolio = Portfolio::where('id', $portfolio->id)->select('id', 'image')->first();
                $imagePath = $portfolio->image;
            }
            $portfolio = $portfolio->find($portfolio->id);;
            $portfolio->title = $request->title;
            $portfolio->client_name = $request->client_name;
            $portfolio->langages = $request->langages;
            $portfolio->project_type = $request->project_type;
            $portfolio->project_link = $request->project_link;
            $portfolio->image = $imagePath;
            $portfolio->update();
        }
        return redirect()->back();
    }

    public function destroy(Portfolio $portfolio){

       $portfolio->delete();
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
    		Portfolio::where('id',$data['portfolio_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'portfolio_id'=>$data['portfolio_id']]);
    	}
    }
}

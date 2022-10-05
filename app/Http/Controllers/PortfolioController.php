<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Session;
use Image;

class PortfolioController extends Controller
{
    //get portfolio
    public function portfolios(){
        Session::put('page','portfolio');
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.portfolios',compact('portfolios'));
    }
    //add edit portfolio
    public function addEditPortfolio(Request $request, $id=null){
        if ($id=="") {
            Session::put('page','addPortfolio');
            $name ="Add Portfolio";
            $portfolio = new Portfolio;
            $portfoliodata = array();
            $message ="Portfolio Add Successfully!";
        }else{
            Session::put('page','editPortfolio');
            $name ="Edit Portfolio";
            $portfoliodata = Portfolio::where('id',$id)->first();

            $portfolio = Portfolio::find($id);
            $message ="Portfolio Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'title' => 'required',
                'link'  => 'required',
                'image' => 'image',
            ];

            $customMessage = [
                'title.required' =>'title is required',
                'link.required'  =>'url is required',
                'image.image'    =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'uploads/images/portfolio/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $portfolio->image = $imagePath;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }

            $portfolio->title       = $data['title'];
            $portfolio->description = $data['description'];
            $portfolio->link        = $data['link'];
            $portfolio->status      = 1;
            $portfolio->save();

            toastr()->success($message);
            return redirect("admin/portfolios");
        }
        return view('admin.portfolio.addEditPortfolio')->with(compact('name','portfoliodata'));
    }
    //delete porfolio
    public function deletePortfolio($id=null){
        $portfolioImage = Portfolio::select('image')->where('id',$id)->first();

        if (file_exists($portfolioImage->image)) {
            unlink($portfolioImage->image);
        }

        Portfolio::where('id',$id)->delete();
        toastr()->success('Portfolio has been deleted Successfully');
        return redirect("admin/portfolios");
    }
    //delete portfolio image
    public function deletePortfolioImage($id=null){
        $portfolioImage = Portfolio::select('image')->where('id',$id)->first();

        if (file_exists($portfolioImage->image)) {
            unlink($portfolioImage->image);
        }
        Portfolio::where('id',$id)->update(['image'=>'']);

        toastr()->success("Portfolio Image has been deleted Successfully!");
        return redirect()->back();
    }
    //portfolio status update
    public function updatePorfolioStatus(Request $request){
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
    //search porfolio
    public function PorfolioSearch(){

    }
}

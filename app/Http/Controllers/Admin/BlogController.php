<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $blogs = new Blog;
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

            $blogs = $blogs->getDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy,  $request->all());
            return response()->json($blogs);
        }
        return view("backend.blog.index");
    }

    public function show(Blog $blog){

        return response()->json($blog);
    }

    public function store(Request $request){
        // dd($request->all());
        $rulse = [
            'title' => 'required',
            'content' => 'required'
        ];

        $customMessage = [
            'title.required' =>'title is required',
            'content.required' =>'Content is required'
        ];

        $this->validate($request,$rulse,$customMessage);

      
        if($request->isMethod("post")){

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'assets/uploads/blog/'.$imageName;
                    Image::make($image_temp)->resize(300, 300)->save($imagePath);

               }
            }
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->created_by = auth()->user()->id;
            $blog->tags = $request->tags;
            $blog->image = $imagePath;
            $blog->save();
        }
      
    }

    public function edit(Blog $blog){

        return response()->json($blog);
    }

    public function update(Request $request, Blog $blog){
        $rulse = [
            'title' => 'required',
            'content' => 'required'
        ];

        $customMessage = [
            'title.required' =>'title is required',
            'content.required' =>'Content is required'
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
            }elseif($blog->id){
                $blog = Blog::where('id', $blog->id)->select('id', 'image')->first();
                $imagePath = $blog->image;
            }
            $blog = $blog->find($blog->id);;
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->created_by = auth()->user()->id;
            $blog->tags = $request->tags;
            $blog->image = $imagePath;
            $blog->update();
        }
        return redirect()->back();
    }

    public function destroy(Blog $blog){

       $blog->delete();
       return redirect()->back();
    }

    public function updateBlogStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Blog::where('id',$data['blog_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'blog_id'=>$data['blog_id']]);
    	}
    }
}

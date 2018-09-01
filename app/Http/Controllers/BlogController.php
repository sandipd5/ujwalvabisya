<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
   
    public function index()
    {
        
        $blog=Blog::orderBY('id','desc')->paginate(6);
        return view('blogs.index')->withBlog($blog);
    }

    
    public function create()
    {
        //
        return view('blogs.create');
    }

    
    public function store(Request $request)
    {
        //
        $blog=new Blog;
        $request->validate([
            'title'=>'required|max:255',
            'body'=>'required'

        ]);
        $blog->title=$request->title;
        $blog->body=$request->body;
        if ($request->hasFile('image')){
            $this->validate($request,
                ['image'=>'image|mimes:jpeg,png,svg,jpg,gif|max:2048'
            ]);
            $filename = url("/images/post") .
                "/"  .
                 $request->file('image')
                ->getClientOriginalName();
                    $destinationPath = "images/post";
                $request->file('image')->move($destinationPath, $filename);
                 $blog->image = $filename;
        }
        $blog->save();
       return redirect()->route('blogs.show',$blog->id);



    }

    
    public function show($id)
    {
        //
        $blog=Blog::find($id);
        return view('blogs.show')->withBlog($blog);
    }

    public function edit($id)
    {
        //
        $blog=Blog::find($id);
        return view('blogs.edit')->withBlog($blog);
    }

   
    public function update(Request $request, $id)
    {

        //validate the data
        $this->validate($request,array(
             'title'=>'required|max:255',
             'body'=>'required'
        ));
        $blog=Blog::find($id);
       
        $blog->title=$request->input('title');
         $blog->body=$request->input('body');
        
         if ($request->hasFile('image')){


          $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
          $filename = $request->file('image')->getClientOriginalName();
            $filename = url("images/post/") .
                "/"  .
            $request->file('image')
                ->getClientOriginalName();
                    $destinationPath = "images/post";
            $request->file('image')->move($destinationPath, $filename);
            $blog->image = $filename;  
           } 
            $blog->save();

        return redirect()->route('blogs.show',$blog->id);
    }

    

    
    public function destroy($id)
    {
        //
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index');
        
    }
}

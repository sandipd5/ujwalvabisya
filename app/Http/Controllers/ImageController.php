<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    
    public function index()
    {
        
        $image=Image::orderBY('id','desc')->paginate(5);
        return view('photos.index')->withImage($image);
    }

    public function create()
    {
        return view('photos.create');
      
    }

    
    public function store(Request $request)
    {
        
               $image= new Image;
               if($request->title){
                $this->validate($request,[
                'title'=>'max:255'
                ]);
                 $image->title=$request->title;
               }
              
                $filename = $request->file('picture');
                $this->validate($request, [
                 'picture' => 'required|mimes:jpeg,png,jpg,gif,svg,mpeg,ogg,mp4,webm,3gp,mov,flv,avi'
                    ]);
                 
                $filename = url("/images/post") .
                    "/"  .
                $request->file('picture')
                    ->getClientOriginalName();
                $destinationPath = "images/post";
                $request->file('picture')->move($destinationPath, $filename);
                $image->picture = $filename;
              

            $image->save();
           // return $image;
           
          return redirect()->route('photos.index');


        
    }
    

    public function destroy($id)
    {
        //
        $image=Image::find($id);
        $image->delete();
        return redirect()->route('photos.index');


    }
}

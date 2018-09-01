<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Cohensive\Embed\Embed;

class VideoController extends Controller
{
    
    public function index()
    {
        //
        $video=Video::orderBY('id','desc')->paginate(5);
        return view('videos.index')->withVideo($video);
    }

  
    public function create()
    {
        //
        return view('videos.create');
    }

    
    public function store(Request $request)
    {
        //
        
        $video=new Video;
        $request->validate([
         'title'=>'required|max:255',
         'video'=>'required|url'
        ]);
        $video->title=$request->title;
        $video->video=$request->video;
        $video->save();
        
         return redirect()->route('videos.index');
    } 

    
     public function destroy($id)
    {
        //
         $video=Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}

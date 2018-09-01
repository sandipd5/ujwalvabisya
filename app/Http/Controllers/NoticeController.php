<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notice=Notice::orderBY('id','desc')->paginate(10);
        return view('notices.index')->withNotice($notice);
    }

    public function create()
    {
        //
        return view('notices.create');
    }

   
    public function store(Request $request)
    {
        //
        $notice=new Notice;
        $request->validate([
            'message'=>'required|max:255'
            

        ]);
        $notice->message=$request->message;
        $notice->save();
        return redirect()->route('notices.index');
    }

    
   
    public function destroy($id)
    {
        //
        $notice=Notice::find($id);
        $notice->delete();
         return redirect()->route('notices.index');

    }
}

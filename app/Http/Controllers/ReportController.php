<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class ReportController extends Controller
{
    public function index()
    {
        //
         $report=Report::orderBY('id','desc')->paginate(6);
        return view('reports.index')->withReport($report);
    }

    
    public function create()
    {
        //
         return view('reports.create');
    }

    
    public function store(Request $request)
    {
           $report= new Report;
           $request->validate([
            'title'=>'required|max:255',
            'report'=>'required|mimes:doc,pdf,docx,zip'
           

        ]);
            $report->title=$request->title;
            $filename = $request->file('report');
             
            $filename = url("/images/reports") .
                "/"  .
            $request->file('report')
                ->getClientOriginalName();
            $destinationPath = "images/reports";
            $request->file('report')->move($destinationPath, $filename);
            $report->report = $filename;
          

            $report->save();
          return redirect()->route('reports.show',$report->id);

    }

    public function show($id)
    {
        //
        $report=Report::find($id);
        return view('reports.show')->withReport($report);
    }

    public function destroy($id)
    {
        //
        $report=Report::find($id);
        $report->delete();
        return redirect()->route('reports.index');
    }
}

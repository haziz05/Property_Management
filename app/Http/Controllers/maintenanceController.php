<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\issue;

class maintenanceController extends Controller
{
    public static function show(){
        $issues = issue::all();
        return view('admin.maintain', compact( 'issues'));
    }

    public static function showQuery($id){
        $query = issue::find($id);
        return view('admin.editQueries', compact( 'query'));
    }

    function update(Request $request){

        $request->validate([
            'address'=>'required|string|max:255',
            'severity'=>'required|string',
            'description'=>'required|string|max:255', 
            'date'=>'required|date', 
            'contact'=>'required|string|min:7|max:255']);

        $issue = issue::find($request->id);
        $issue->id=$request->id;
        $issue->address=$request->address;
        $issue->severity=$request->severity;
        $issue->description=$request->description;
        $issue->date=$request->date;
        $issue->contact=$request->contact;
        $issue->save();
        return redirect('/maintenance');
    }

    function remove($id){
        $data = issue::find($id);
        $data->delete();

        $issues = issue::orderBy('query_number')->get();

        $count = 1;
        foreach ($issues as $issue){
            $issue->query_number = $count++;
            $issue->save();
        }

        return redirect('/maintenance');
    }

    function add(Request $request){

        $request->validate([
            'address'=>'required|string|max:255',
            'severity'=>'required|string',
            'description'=>'required|string|max:255', 
            'date'=>'required|date', 
            'contact'=>'required|string|min:7|max:255']);


        $issue = new issue();
        $issue->id=$request->id;

        $queryNumber = issue::max('query_number');
        $issue->query_number= $queryNumber ? $queryNumber + 1:1;

        $issue->address=$request->address;
        $issue->severity=$request->severity;
        $issue->description=$request->description;
        $issue->date=$request->date;
        $issue->contact=$request->contact;
        $issue->save();
        return redirect('/maintenance');
    }
}

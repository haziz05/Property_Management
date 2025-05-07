<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\issue;
use App\Models\property;

class maintenanceController extends Controller
{
    public static function show(){
        $issues = issue::all();
        $properties = property::all();
        return view('admin.maintain', compact( 'issues', 'properties'));
    }

    public static function showQuery($id){
        $user_name = Auth::user()->name;
        $query = issue::find($id);
        $curr_property = Property::where('Address', $query->address)->first();
        $properties = Property::where('Address', '!=', $query->address)->get();
        return view('admin.editQueries', compact( 'query', 'curr_property', 'properties'));
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
        $issue->progress = $request->progress;
        $issue->save();
        return redirect('/maintenance');
    }

    function remove($id){
        $data = issue::find($id);
        $data->delete();

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

        $issue->address=$request->address;
        $issue->severity=$request->severity;
        $issue->description=$request->description;
        $issue->date=$request->date;
        $issue->contact=$request->contact;
        $issue->save();
        return redirect('/maintenance');
    }
}

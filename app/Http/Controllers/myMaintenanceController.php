<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myMaintenanceController extends Controller
{
    function show() {
        $user = Auth::user();
        $user_name = $user->name;
        $user_email = $user->email;

        $tenants = Tenant::where('email', $user_email)->get(); //Gets the first tenant record that matches teh user's email
        $propertyIds = $tenants->pluck('property_id')->unique(); //Gets the tenant properties IDs
        $properties = Property::whereIn('id', $propertyIds)->get(); //Gets the actual properties
        $myQueries = Issue::where('contact', $user_email)->get();//Get issues where contact mathces logged-in user's eamil

        return view('tenant.myMaintenance', compact('user_name', 'properties', 'myQueries'));
    }

    public static function showQuery($id){
        $user_name = Auth::user()->name;
        $query = issue::find($id);
        $curr_property = Property::where('Address', $query->address)->first();
        $properties = Property::where('Address', '!=', $query->address)->get();

        
        return view('tenant.myEditQueries', compact('query', 'curr_property', 'properties'));
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
        return redirect('/myMaintenance');
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
        return redirect('/myMaintenance');
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

        return redirect('/myMaintenance');
    }
}

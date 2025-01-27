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
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;
        $tenant = Tenant::all();

        $id = "";

        $tenant->each(function($tenant) use($user_email, &$id){
            if($tenant->email == $user_email){
                $id = $tenant->property_id;
            }
        });

        $property = property::find($id);
        $person = Tenant::find($id);

        $queries = issue::all();
        $myQueries = [];

        $queries->each(function($query) use($property, &$myQueries){
            if($query->address == $property->Address){
                $myQueries[] = $query;
            }
        });



        return view('tenant.myMaintenance', compact('user_name', 'property', 'person', 'myQueries'));
    }

    public static function showQuery($id){
        $user_name = Auth::user()->name;
        $query = issue::find($id);

        
        return view('tenant.myEditQueries', compact('user_name', 'query'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    // For current tenant
    function show() {

        $persons = Tenant::all();
        $propertyID = $persons->pluck('property_id')->toArray(); // Get property IDs
        $propertyMap = Property::whereIn('id', $propertyID)->get()->keyBy('id'); // Map properties by ID

        $properties = $persons->map(function ($person) use ($propertyMap) {
            return $propertyMap[$person->property_id] ?? null;
        });

        return view('admin.current_tenant', compact('properties', 'persons'));
    }

    //For tenants on edit page
    public static function showTenant(){
        $persons = Tenant::all();
        $uniqueProp = Property::all();
        $propertyID = $persons->pluck('property_id')->toArray(); // Get property IDs
        $propertyMap = Property::whereIn('id', $propertyID)->get()->keyBy('id'); // Map properties by ID

        $properties = $persons->map(function ($person) use ($propertyMap) {
            return $propertyMap[$person->property_id] ?? null;
        });
        
        return view('admin.edit_tenant_main', compact( 'uniqueProp', 'persons', 'properties'));
    }

    public static function addTenant(Request $request){

        $request->validate([
            'Name'=>'required|string',
            'property'=>'required|integer',
            'area'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string'
        ]);

        $person = new Tenant();
        $person->name = request('Name');

        $prop_id = request('property');
        
        if (is_numeric($prop_id)){
            $person->property_id = request('property');
        } else{
            $person->property_id = 0;
        }
        
        $person->area = request('area');
        $person->phone = request('phone');
        $person->email = request('email');
        $person->save();
        return redirect("/editTenant");

    }

    function remove($tenant_id){
        $data = Tenant::find($tenant_id);
        $data->delete();
        return redirect('/currentTenant');
    }

    function editTenant($tenant_id){
        $user_name = Auth::user()->name;
        $person = Tenant::find($tenant_id);
        $curr_property = Property::find($person->property_id);
        $properties = Property::where('id', '!=', $person->property_id)->get();

        return view('admin.edit_tenant', compact( 'person', 'curr_property', 'properties'));
    }

    function update(Request $request){

        $request->validate([
            'Name'=>'required|string',
            'property_id'=>'required|integer',
            'area'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string'
        ]);

        $person = Tenant::find($request->id);
        $person->id=$request->id;
        $person->name=$request->Name;
        $person->property_id=$request->property_id;
        $person->area=$request->area;
        $person->phone=$request->phone;
        $person->email=$request->email;
        $person->save();
        return redirect('/editTenant');
    }
}

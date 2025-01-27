<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    function show() {
        $properties = property::all();
        $persons = Tenant::all();
        return view('admin.current_tenant', compact( 'properties', 'persons'));
    }

    public static function showTenant(){
        $user_name = Auth::user()->name;
        $properties = property::all();
        $persons = Tenant::all();
        
        return view('admin.edit_tenant_main', compact('user_name', 'persons', 'properties'));
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
        return redirect('/editTenant');
    }

    function editTenant($tenant_id){
        $user_name = Auth::user()->name;
        $person = Tenant::find($tenant_id);
        return view('admin.edit_tenant', compact('user_name', 'person'));
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

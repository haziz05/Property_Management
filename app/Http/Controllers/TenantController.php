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
        $allProperties = Property::all()->keyBy('id');
        $tenants = Tenant::all()->groupBy('property_id');

        $propertiesWithTenants = $allProperties->map(function ($property, $id) use ($tenants) {
            return [
                'property' => $property,
                'tenants' => $tenants->get($id, collect()),
            ];
        });

        return view('admin.current_tenant', ['propertiesWithTenants' => $propertiesWithTenants]);
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
        $tenant = Tenant::find($tenant_id);

        if (!$tenant) {
            return redirect('/currentTenant');
        }

        $tenantEmail = $tenant->email;

        // Delete the tenant entry
        $tenant->delete();

        // Check if any other tenants exist with the same email
        $remainingTenants = Tenant::where('email', $tenantEmail)->count();

        $property = \App\Models\Property::find($tenant->property_id);
        if ($property) {
            \App\Models\Issue::where('contact', $tenantEmail)
                ->where('tenant', $tenant->name)
                ->where('address', $property->Address)
                ->update([
                    'tenant' => 'Past Tenant',
                    'contact' => Auth::user()->email,
                ]);
        }

        if ($remainingTenants === 0) {
            \App\Models\User::where('email', $tenantEmail)->delete();
        }

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

<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashControllerT extends Controller
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

        return view('tenant.tenant_dash', compact('user_name', 'property', 'person'));
    }
}


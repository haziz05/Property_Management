<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashControllerT extends Controller
{
    function show() {
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;

        
        $tenant = Tenant::where('email', $user_email)->get(); //All tenants are filtered by email
        $propertiesID = $tenant->pluck('property_id')->toArray(); //Gets matching property IDs
        $properties = Property::whereIn('id', $propertiesID)->get(); //Gets properties that mathc the IDs
        $myQueries = Issue::where('contact', $user_email)->get();

        return view('tenant.tenant_dash', compact('user_name', 'properties', 'myQueries'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\Tenant;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashController extends Controller
{
    function show() {
        $user_name = Auth::user()->name;
        $properties = property::all();
        $issues = issue::all();

        $people = Tenant::all()->unique('email')->values();
        return view('admin.admin_dash', compact('user_name', 'properties', 'people', 'issues'));
    }
}

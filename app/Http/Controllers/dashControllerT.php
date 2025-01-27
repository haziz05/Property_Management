<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashControllerT extends Controller
{
    function show() {
        $user_name = Auth::user()->name;
        return view('tenant.tenant_dash', compact('user_name'));
    }
}


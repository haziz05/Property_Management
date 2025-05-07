<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myLeaseController extends Controller
{
    public function show(){
        return view('tenant.myLease');
    }
}

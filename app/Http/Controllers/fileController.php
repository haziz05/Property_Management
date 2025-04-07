<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\Tenant;
use App\Models\property;
use App\Models\tenantFile;
use App\Models\propertyFile;
use Illuminate\Http\Request;
use App\Models\maintenanceFile;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class fileController extends Controller
{
    //Uploading File Logic
    //Tenant File Logic
    function showTenantUpload() {
        $properties = property::all();
        $persons = Tenant::all();
        return view('admin.upload.tenant', compact( 'properties', 'persons'));
    }

    public static function uploadTenantFile(Request $request) {

        $request->validate([
            'inputName'=>'required|string',
            'property'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'date'=>'required|date',
            'file'=>'required|array',
            'file.*'=>'file|max:90000'
        ]);

        foreach($request->file('file') as $currentFile){
            $file = new tenantFile();
            $file->id=$request->id;
            $file->name=$request->inputName;
            $file->address=$request->property;
            $file->phone=$request->phone;
            $file->email=$request->email;
            $file->date=$request->date;
            $file->fileName=$currentFile->getClientOriginalName();
            $file->path=$currentFile->store('uploads', 'public');
            $file->save();
        }
        
        session()->flash('success', 'Tenant file uploaded successfully!');

        return redirect('showTenantUpload');

    }

    //Maintenance File Logic
    function showMaintenanceUpload(){
        $properties = property::all();
        $persons = Tenant::all();
        $issues = issue::all();
        return view('admin.upload.maintenance', compact( 'properties', 'persons','issues'));
    }

    public static function uploadMaintenanceFile(Request $request) {

        $request->validate([
            'queryNumber'=>'required|string',
            'inputName'=>'required|string',
            'property'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'date'=>'required|date',
            'file'=>'required|array',
            'file.*'=>'file|max:90000'
        ]);

        foreach($request->file('file') as $currentFile){
            $file = new maintenanceFile();
            $file->id=$request->id;
            $file->queryNumber=$request->queryNumber;
            $file->tenantName=$request->inputName;
            $file->address=$request->property;
            $file->phone=$request->phone;
            $file->email=$request->email;
            $file->date=$request->date;
            $file->fileName=$currentFile->getClientOriginalName();
            $file->path=$currentFile->store('uploads', 'public');
            $file->save();
        }

        session()->flash('success', 'Maintenance file uploaded successfully!');

        return redirect('showMaintenanceUpload');

    }


    //Property File Logic
    function showPropertyUpload(){
        $properties = property::all();
        return view('admin.upload.properties', compact( 'properties'));
    }

    public static function uploadPropertyFile(Request $request) {

        $request->validate([
            'property'=>'required|string',
            'date'=>'required|date',
            'file'=>'required|array',
            'file.*'=>'file|max:90000'
        ]);

        foreach($request->file('file') as $currentFile){
            $file = new propertyFile();
            $file->id=$request->id;
            $file->address=$request->property;
            $file->date=$request->date;
            $file->fileName=$currentFile->getClientOriginalName();
            $file->path=$currentFile->store('uploads', 'public');
            $file->save();
        }

        session()->flash('success', 'Property file uploaded successfully!');

        return redirect('showPropertyUpload');

    }

    //Selecting File Logic

    function showSelect(Request $request){
        // Get the filter value from the query string (default to 'all')
        $filter = $request->input('filter', 'all');

        // Initialize collections for each file type
        $maintenanceFiles = collect();
        $propertyFiles = collect();
        $tenantFiles = collect();

        // Based on the filter, query only the relevant file types
        if ( $filter === 'maintenance') {
            $maintenanceFiles = maintenanceFile::all();
        }
        if ( $filter === 'property') {
            $propertyFiles =propertyFile::all();
        }
        if ( $filter === 'tenant') {
            $tenantFiles = tenantFile::all();
        }


        return view('admin.selectFiles', compact('tenantFiles', 'maintenanceFiles', 'propertyFiles', 'filter'));
    }
    //View Tenant File
    public static function viewTenantFiles($id){
        $file = tenantFile::find($id);
        $path = $file->path;

        return response()->file(storage_path('app/public/'.$path));
    }

    //View Maintenace Files
    public static function viewMaintenanceFiles($id){
        $file = maintenanceFile::find($id);
        $path = $file->path;

        return response()->file(storage_path('app/public/'.$path));
    }

    //View Property Files
    public static function viewPropertyFiles($id){
        $file = propertyFile::find($id);
        $path = $file->path;

        return response()->file(storage_path('app/public/'.$path));
    }

    
}

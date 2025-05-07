<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\Tenant;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    function show() {
        $properties = property::all();
        return view('admin.listings', compact( 'properties'));
    }

    public static function showPropertyEditor(){
        $user_name = Auth::user()->name;
        $properties = property::all();
        $persons = Tenant::all();
        
        return view('admin.editMain', compact('user_name', 'persons', 'properties'));
    }

    function addProperty(Request $request){

        $request->validate([
            'address'=>'required|string',
            'size'=>'required|string',
            'description'=>'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $property = new property();
        $property->Address = request('address');
        $property->size = request('size');
        $property->description = request('description');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('property_images', 'public');
            $property->image_path = $path;
            $property->image_original_name = $request->file('image')->getClientOriginalName();
        }
        $property->save();
        return redirect('/edit');

    }

    function removeProperty($property_id){
        $data=property::find($property_id);
        $data->delete();
        return redirect('/edit');
    }

    function editProperty($property_id){
        $user_name = Auth::user()->name;
        $property = property::find($property_id);
        return view('admin.edit', compact('property', 'user_name'));
    }

    function update(Request $request){
        
        $request->validate([
            'Address'=>'required|string',
            'Size'=>'required|string',
            'Description'=>'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $property = property::find($request->id);
        $property->Address=$request->Address;
        $property->size=$request->Size;
        $property->description=$request->Description;
        if ($request->hasFile('image')) {
            if ($property->image_path) {
                Storage::disk('public')->delete($property->image_path);
            }
            $path = $request->file('image')->store('property_images', 'public');
            $property->image_path = $path;
            $property->image_original_name = $request->file('image')->getClientOriginalName();
        }
        $property->save();
        return redirect('/edit');

    }
}

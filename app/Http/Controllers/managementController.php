<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\Tenant;
use App\Models\property;


class managementController extends Controller
{
    public static function show($id){
        $property = property::find($id);
        $persons = Tenant::all();
        
        $queries = issue::where('address', $property->Address)->get();
        

        $occupied_tenants = [];
        $occupied_area = [];

        $persons->each(function ($person) use ($id, $property, &$occupied_tenants, &$occupied_area) {
            if ($person->property_id == $id) {
                $occupied_tenants[] = $person;
                if(array_sum($occupied_area) == $property->size){
                    $occupied_area[] = $person->area;
                }
            }
        });

        $total_area = self::percentage($occupied_tenants, $property);

        $numOfTenants = count($occupied_tenants);

        
        return view('admin.management', compact( 
            'occupied_tenants', 
            'property', 
            'occupied_area', 
            'total_area', 
            'numOfTenants',
            'queries'
        ));
    }

    public static function percentage($occupied_tenants, $property){

        $total = 0;
        for($i = 0; $i < count($occupied_tenants); $i++){
            $total += $occupied_tenants[$i]->area;
        }

        $percent = ( $total/($property->size) )*100;

        return round($percent, 0);
        
    }

    
}



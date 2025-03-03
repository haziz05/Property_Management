@extends('adminlte::page')

@section('title', 'Management - ' . $property['Address'])

@section('content_header')
    <h1>Management</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $property['Address'] }}</li>
    </ol>
@stop

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-body">
            <h1>{{ $property['Address'] }}</h1>
            <h2>Currently {{ $total_area }}% of the leasable area is being occupied</h2>
            <hr>
            <h4>Information:</h4>
            <p>The total leasable area of this property is {{ $property['size'] }} sq ft</p>
            <p>Description: {{ $property['description'] }}</p>
            <hr>
            <h1>Current Tenants:</h1>
            @foreach($occupied_tenants as $tenant)
                <h4>
                    <a href="{{ route('currentTenant') }}">{{ $tenant['name'] }}</a>, currently occupying {{ $tenant['area'] }} sq ft
                </h4>
            @endforeach
        </div>
    </div>
</div>
@stop


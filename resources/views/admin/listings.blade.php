@extends('adminlte::page')

@section('title', 'Listings')

@section('content_header')
    <h1>Listings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Listings</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @foreach($properties as $property)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <!-- Property Info -->
                            <div class="col-md-4">
                                <h4 class="text-primary">{{ $property['Address'] }}</h4>
                                <div class="text-secondary">
                                    {{ $property['size'] }} sq ft
                                </div>
                            </div>

                            <!-- Property Description -->
                            <div class="col-md-4">
                                <p class="mb-0">{{ $property['description'] }}</p>
                            </div>

                            <!-- Manage Button -->
                            <div class="col-md-4 text-center">
                                <a href="{{ route('manageProperty', ['id' => $property['id']]) }}" class="btn btn-primary">
                                    Manage Property
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop

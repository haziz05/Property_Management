@extends('adminlte::page')

@section('title', 'Edit Tenant')

@section('content_header')
    <h1>Edit Tenant</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Tenant</li>
    </ol>
@stop

@section('content')
<div class="container-fluid px-4">
    <!-- Card for Adding New Tenant -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-plus"></i> Add Tenant
        </div>
        <div class="card-body">
            <form action="{{ route('addTenant') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="Name" placeholder="Enter tenant name">
                        @error('Name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="property" class="col-sm-2 col-form-label">Property</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="property" name="property">
                            <option value="">No Property</option>
                            @foreach($properties as $property)
                                <option value="{{ $property['id'] }}">{{ $property['Address'] }}</option>
                            @endforeach
                        </select>
                        @error('property')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="area" class="col-sm-2 col-form-label">Occupying Area</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="area" name="area" placeholder="Enter area in sq ft">
                        @error('area')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Tenant</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Card for Listing Existing Tenants -->
    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-edit"></i> Existing Tenants
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($persons as $person)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Tenant Name -->
                                    <div class="col-12 col-md-4">
                                        <h4 class="text-primary">{{ $person['name'] }}</h4>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div class="col-12 col-md-4 text-center">
                                        <a href="{{ route('editTenant', ['tenant_id' => $person['id']]) }}" class="btn btn-primary mb-2">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-4 text-center">
                                        <a href="{{ route('removeTenant', ['tenant_id' => $person['id']]) }}" 
                                           onclick="return confirm('Are you sure you want to remove this tenant?')" 
                                           class="btn btn-danger">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop

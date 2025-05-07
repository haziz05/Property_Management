@extends('adminlte::page')

@section('title', 'Edit Listings')

@section('content_header')
    <h1>Edit Listings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Listings</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <!-- Card for Adding New Property -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus"></i> Add Property
        </div>
        <div class="card-body">
            <form action="{{ route('addProperty') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Property Address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="size" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="size" name="size" placeholder="Enter Property Size">
                        @error('size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Property Description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="image" class="col-sm-2 col-form-label">Property Image</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Property</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Card for Listing Existing Properties -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-home"></i> Existing Properties
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($properties as $property)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Property Info -->
                                    <div class="col-md-4">
                                        <h4 class="text-primary">{{ $property['Address'] }}</h4>
                                        <p class="mb-0 text-secondary">{{ $property['size'] }} sq ft</p>
                                    </div>
                                    <!-- Property Description -->
                                    <div class="col-md-4">
                                        <p>{{ $property['description'] }}</p>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div class="col-md-4 text-center">

                                        <a href="{{ route('editProperty', ['property_id' => $property['id']]) }}" 
                                            class="btn btn-primary">
                                            Edit
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





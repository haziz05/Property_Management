@extends('adminlte::page')

@section('title', 'Update Property')

@section('content_header')
    <h1>Update Property</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('editScreen') }}">Edit Property</a></li>
        <li class="breadcrumb-item active">Update</li>
    </ol>
@stop

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-home"></i> Update Property
        </div>
        <div class="card-body">
            <form action="{{ route('updateProperty') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $property['id'] }}">

                <div class="mb-3 row">
                    <label for="Address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Address" name="Address" value="{{ $property['Address'] }}">
                        @error('Address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="Size" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Size" name="Size" value="{{ $property['size'] }}">
                        @error('Size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Description" name="Description" value="{{ $property['description'] }}">
                        @error('Description')
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@stop

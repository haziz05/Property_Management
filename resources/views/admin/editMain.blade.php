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

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Data</button>
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
                                        <h4 class="text-primary"><a href="{{ route('editProperty', ['property_id' => $property['id']]) }}">{{ $property['Address'] }}</a></h4>
                                        <p class="mb-0 text-secondary">{{ $property['size'] }} sq ft</p>
                                    </div>
                                    <!-- Property Description -->
                                    <div class="col-md-4">
                                        <p>{{ $property['description'] }}</p>
                                    </div>
                                    <!-- Action Buttons -->
                                    <div class="col-md-4 text-center">

                                        <a href="{{ route('removeProperty', ['property_id' => $property['id']]) }}" 
                                            class="btn btn-danger remove-property">
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

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.remove-property').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); 
            const url = this.getAttribute('href'); 

            Swal.fire({
                title: 'Are you sure you want to remove this property?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});
</script>
@stop



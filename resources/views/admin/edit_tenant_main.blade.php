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
            <i class="fas fa-plus"></i> Add Tenant
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
                            @foreach($uniqueProp as $property)
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
                        <input type="tel" class="form-control" id="phone" name="phone" inputmode="numeric" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone">
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
            <i class="fas fa-user"></i> Existing Tenants
        </div>
        <div class="card-body">
            <div class="row">
                @for ($i = 0; $i < count($persons); $i++)
                    <div class="col-12 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Tenant Name -->
                                    <div class="col-12 col-md-4">
                                        <h4 class="text-primary">{{ $persons[$i]['name'] }}</h4>
                                    </div>
                                    <!-- Property Address -->
                                    <div class="col-12 col-md-4 text-center">
                                        <div class="col-md-4">
                                            <p>{{ $properties[$i]['Address'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <!-- Action Button -->
                                    <div class="col-12 col-md-4 text-center">
                                        <a href="{{ route('editTenant', ['tenant_id' => $persons[$i]['id']]) }}" class="btn btn-primary mb-2">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function() {
        // Strip non-digits and limit to 10 characters
        var digits = this.value.replace(/\D/g, '').slice(0, 10);
        // Format as XXX-XXX-XXXX
        var formatted = digits;
        if (digits.length > 6) {
            formatted = digits.slice(0,3) + '-' + digits.slice(3,6) + '-' + digits.slice(6);
        } else if (digits.length > 3) {
            formatted = digits.slice(0,3) + '-' + digits.slice(3);
        }
        this.value = formatted;
    });
});
</script>
@stop

@extends('adminlte::page')

@section('title', 'Current Tenants')

@section('content_header')
    <h1>Current Tenants</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Current Tenants</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($persons as $person)
        <div class="col-12 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Tenant Name -->
                        <div class="col-md-4">
                            <h4 class="text-primary">{{ $person['name'] }}</h4>
                        </div>
                        <!-- Tenant Details -->
                        <div class="col-md-4">
                            <ul class="list-unstyled mb-0">
                                <li><strong>Phone:</strong> {{ $person['phone'] }}</li>
                                <li><strong>Email:</strong> {{ $person['email'] }}</li>
                            </ul>
                        </div>
                        <!-- Action Button -->
                        <div class="col-md-4 text-center">
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
@stop



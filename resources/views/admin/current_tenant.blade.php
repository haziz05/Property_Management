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
        @foreach ($propertiesWithTenants as $entry)
            @php
                $property = $entry['property'];
                $propertyTenants = $entry['tenants'];
            @endphp
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="mb-0">{{ $property['Address'] }}</h4>
                    </div>
                    <div class="card-body">
                        @if ($propertyTenants->isEmpty())
                            <p>No tenant for this property.</p>
                        @else
                            @foreach ($propertyTenants as $tenant)
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-4">
                                        <h5 class="text-primary">{{ $tenant['name'] }}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-unstyled mb-0">
                                            <li><strong>Email:</strong> {{ $tenant['email'] }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="{{ route('removeTenant', ['tenant_id' => $tenant['id']]) }}" 
                                            class="btn btn-danger remove-property">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
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
                title: 'Are you sure you would like to delete this person as a tenant?',
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

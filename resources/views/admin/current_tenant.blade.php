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
        @for ($i = 0; $i < count($persons); $i++)
        <div class="col-12 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Tenant Name -->
                        <div class="col-md-4">
                            <h4 class="text-primary">{{ $persons[$i]['name'] }}</h4>
                        </div>
                        <!-- Tenant Details -->
                        <div class="col-md-4">
                            <ul class="list-unstyled mb-0">
                                <li><strong>Address:</strong> {{ $properties[$i]['Address'] }}</li>
                                <li><strong>Email:</strong> {{ $persons[$i]['email'] }}</li>
                            </ul>
                        </div>
                        <!-- Action Button -->
                        <div class="col-md-4 text-center">
                            <a href="{{ route('removeTenant', ['tenant_id' => $persons[$i]['id']]) }}" 
                                class="btn btn-danger remove-property">
                                Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
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

@extends('adminlte::page')

@section('title', 'Select Files')

@section('content_header')
    <h1>Select Files</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Select Files</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <!-- Filter Form -->
    <form method="GET" action="{{ route('showSelect') }}">
        <div class="form-group mb-3">
            <label for="file-filter">Filter Files:</label>
            <select id="file-filter" name="filter" class="form-control" onchange="this.form.submit()">
                <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>Select Files to Display</option>
                <option value="maintenance" {{ $filter === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                <option value="property" {{ $filter === 'property' ? 'selected' : '' }}>Property</option>
                <option value="tenant" {{ $filter === 'tenant' ? 'selected' : '' }}>Tenant</option>
            </select>
        </div>
    </form>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-file"></i> Select File
        </div>
        
        <!-- Maintenance Files -->
        @if($filter === 'maintenance')
        <div class="card-body" id="maintenance-files">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Tenant Name</th>
                            <th>Property Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($maintenanceFiles as $file)
                        <tr>
                            <td>
                                <a href="{{ route('viewMaintenanceFiles', $file->id) }}" target="_blank">
                                    {{ $file['fileName'] }}
                                </a>
                            </td>
                            <td>{{ $file['tenantName'] }}</td>
                            <td>{{ $file['address'] }}</td>
                            <td>{{ $file['phone'] }}</td>
                            <td>{{ $file['email'] }}</td>
                            <td>{{ $file['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Property Files -->
        @if($filter === 'property')
        <div class="card-body" id="property-files">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Property Address</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($propertyFiles as $file)
                        <tr>
                            <td>
                                <a href="{{ route('viewPropertyFiles', $file->id) }}" target="_blank">
                                    {{ $file['fileName'] }}
                                </a>
                            </td>
                            <td>{{ $file['address'] }}</td>
                            <td>{{ $file['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Tenant Files -->
        @if($filter === 'tenant')
        <div class="card-body" id="tenant-files">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Tenant Name</th>
                            <th>Property Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tenantFiles as $file)
                        <tr>
                            <td>
                                <a href="{{ route('viewTenantFiles', $file->id) }}" target="_blank">
                                    {{ $file['fileName'] }}
                                </a>
                            </td>
                            <td>{{ $file['name'] }}</td>
                            <td>{{ $file['address'] }}</td>
                            <td>{{ $file['phone'] }}</td>
                            <td>{{ $file['email'] }}</td>
                            <td>{{ $file['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>
@stop


@extends('adminlte::page')

@section('title', 'Maintenance')

@section('content_header')
    <h1>Maintenance</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Maintenance</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <!-- Queries Card -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area"></i> Maintenace Issues
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Address</th>
                            <th>Severity of Issue</th>
                            <th>Description</th>
                            <th>Progress</th>
                            <th>Date</th>
                            <th>Tenant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($issues as $issue)
                        <tr>
                            <td>
                                <a href="{{ route('query', ['id' => $issue['id']]) }}">{{ $loop->iteration }}</a>
                            </td>
                            <td>{{ $issue['address'] }}</td>
                            <td>
                                @php
                                $severity = strtolower($issue['severity']);
                                $badgeClass = '';
                                if($severity === 'high') {
                                    $badgeClass = 'danger'; // red
                                } elseif($severity === 'medium') {
                                    $badgeClass = 'warning'; // yellow
                                } elseif($severity === 'low') {
                                    $badgeClass = 'secondary'; // gray
                                }
                                @endphp
                                <span class="badge badge-{{ $badgeClass }}" >{{ ucfirst($severity) }}</span>
                            </td>
                            <td>{{ $issue['description'] }}</td>
                            <td>
                                @php
                                $progress = strtolower($issue['progress']);
                                $progressClass = match ($progress) {
                                    'not started' => 'secondary',  // gray
                                    'in-progress' => 'primary',   // blue
                                    'completed' => 'success',     // green
                                    default => 'light',
                                };
                                @endphp
                                <span class="badge badge-{{ $progressClass }}">{{ ucfirst($progress) }}</span>
                            </td>
                            <td>{{ $issue['date'] }}</td>
                            <td>{{ $issue['tenant'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Query Card -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus"></i> Add Query
        </div>
        <div class="card-body">
            <form action="{{ route('addQuery') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="address" name="address">
                            <option value="" selected disabled hidden>Select a Property</option>
                            @foreach($properties as $property)
                                <option value="{{ $property['Address'] }}">{{ $property['Address'] }}</option>
                            @endforeach
                        </select>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="severity" class="col-sm-2 col-form-label">Severity of Issue</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="severity" name="severity">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Provide a Description of the issue">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tenant" class="col-sm-2 col-form-label">Tenant</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tenant" name="tenant">
                            <option value="" selected disabled hidden>Select a Tenant</option>
                            <option value="Admin">Admin</option>
                            @foreach($tenants as $tenant)
                                <option value="{{ $tenant['name'] }}" data-email="{{ $tenant['email'] }}">{{ $tenant['name'] }}</option>
                            @endforeach
                        </select>
                        @error('tenant')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="hidden" id="contact" name="contact">
                    </div>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Query</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tenantSelect = document.getElementById('tenant');
        var contactInput = document.getElementById('contact');
        tenantSelect.addEventListener('change', function() {
            var selected = tenantSelect.options[tenantSelect.selectedIndex];
            contactInput.value = selected.getAttribute('data-email');
        });
    });
</script>
@stop

@extends('adminlte::page')

@section('title', 'Management - ' . $property['Address'])

@section('content_header')
    <h1>Management</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listings') }}">Listings</a>
        <li class="breadcrumb-item active">{{ $property['Address'] }}</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-body">
                    @if($property->image_path)
                        <img src="{{ Storage::url($property->image_path) }}"
                             alt="{{ $property->image_original_name }}"
                             class="img-fluid">
                    @else
                        <img src="/images/placeholder.png"
                             alt="No image available"
                             class="img-fluid">
                    @endif
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info"></i> Information
                </div>
                <div class="card-body">
                    <h1>{{$property['Address']}}</h1><br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Total Area</th>
                                    <th>Occupied %</th>
                                    <th>Tenants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $property['description'] }}</td>
                                    <td>{{ $property['size'] }} sq ft</td>
                                    <td>{{ $total_area }}%</td>
                                    <td>{{ $numOfTenants }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><br>
                    <h4>Outstanding Fees and Payments</h4>
                    <p>Will go here</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user"></i> Current Tenants
                </div>
                @foreach($occupied_tenants as $tenant)
                <div class="card-body">
                    <a href="{{route('currentTenant') }}">{{ $tenant['name']}}</a><br>
                    Occupies: {{ $tenant['area'] }} sq ft <br>
                    Phone: {{ $tenant['phone'] }} <br>
                    Email: {{ $tenant['email'] }}
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-brush"></i> Maintenance
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Level of Issue</th>
                                    <th>Description</th>
                                    <th>Progress</th>
                                    <th>Tenant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($queries as $issue)
                                <tr>
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
                                    <td>{{ $issue['tenant'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-4">
                    <a href="{{ route('removeProperty', ['property_id' => $property['id']]) }}" class="btn btn-danger remove-property">
                        Remove
                    </a>
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

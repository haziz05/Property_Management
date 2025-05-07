@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container-fluid">

    <div class="row">
        <!-- Maintenance Issues Card -->
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    <a href="{{ route('maintenance') }}">Maintenance Issues</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                    <th>Level of Issue</th>
                                    <th>Description</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($issues as $issue)
                                <tr>
                                    <td><strong>{{ $issue['address'] }}</strong></td>
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
                                </tr>                                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tenants Card -->
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('currentTenant') }}">Tenants</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($people as $person)
                                <tr>
                                    <td><strong>{{ $person['name'] }}</strong></td>
                                    <td>{{ $person['phone'] }}</td>
                                    <td>
                                        <a href="mailto:{{ $person['email'] }}">
                                            {{ $person['email'] }}
                                        </a>
                                    </td>
                                </tr>                                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties Card -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-home"></i>
            <a href="{{ route('listings') }}">Properties</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Leasable Area</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                        <tr>
                            <td><strong>{{ $property['Address'] }}</strong></td>
                            <td>{{ $property['size'] }}</td>
                            <td>{{ $property['description'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


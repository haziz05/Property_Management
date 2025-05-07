@extends('adminlte::page')

@section('title', 'My Dashboard')

@section('content_header')  
    <h1>Welcome {{$user_name}}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!--My Properties Card -->
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center" >
            <div class="flex-grow-1">
                <i class="fas fa-home"></i>
                My Properties
            </div>
            <div>
                <button class="btn btn-outline-secondary btn-sm me-1" id="prevProperty"><i class="fas fa-chevron-left"></i></button>
                <button class="btn btn-outline-secondary btn-sm" id="nextProperty"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        @foreach($properties as $index => $property)
        <div class="card-body property-item" @if($index !== 0) style="display: none;" @endif>
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ $property['image_url'] ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" alt="Property Image" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <h5>{{ $property['Address'] }}</h5>
                    <h5>Lease Payment:</h5>
                    <h5>Description: {{ $property['description'] }}</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="btn btn-primary">Contact a Manager</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <!-- Finances Card -->
         <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-money-bill"></i>
                    <a href="{{ route('myLease') }}">My Lease</a>
                </div>

                <div class="card-body">

                </div>
            </div>
         </div>

         <!-- Maintenance Card -->
          <div class="col-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        <a href="{{ route('tenantQueryScreen') }}">My Maintenace</a> 
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
                                    @foreach($myQueries as $query)
                                    <tr>
                                        <td><strong>{{ $query['address'] }}</strong></td>
                                        <td>
                                            @php
                                            $severity = strtolower($query['severity']);
                                            $badgeClass = '';
                                            if($severity === 'high'){
                                                $badgeClass = 'danger'; //red
                                            } elseif($severity === 'medium'){
                                                $badgeClass = 'warning'; //yellow
                                            } elseif($severity === 'low') {
                                                $badgeClass = 'secondary'; //gray
                                            }
                                            @endphp
                                            <span class="badge badge-{{ $badgeClass }}">{{ ucfirst($severity) }}</span>
                                        </td>
                                        <td>{{ $query['description'] }}</td>
                                        <td>
                                            @php
                                            $progress = strtolower($query['progress']);
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
    </div>
</div>
@stop

@section('js')
<script>
    let currentIndex = 0;
    const propertyItems = document.querySelectorAll('.property-item');

    function showProperty(index) {
        propertyItems.forEach((item, i) => {
            item.style.display = i === index ? 'block' : 'none';
        });
    }

    document.getElementById('nextProperty').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % propertyItems.length;
        showProperty(currentIndex);
    });

    document.getElementById('prevProperty').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + propertyItems.length) % propertyItems.length;
        showProperty(currentIndex);
    });
</script>
@stop

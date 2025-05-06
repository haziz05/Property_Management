@extends('adminlte::page')

@section('title', 'My Dashboard')

@section('content_header')  
    <h1>Welcome {{$user_name}}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!--My Properties Card -->
    <div class="card mb-4">
        @foreach($properties as $property)
        <div class="card-header">
            <i class="fas fa-home"></i>
            My Properties
        </div>

        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="" alt="Property Image" class="img-fluid">
                </div>

                <div class="col-md-4">
                    <h5>{{$property['Address']}}</h5>
                    <h5>Lease payment:</h5>
                    <h5>Description: {{$property['description']}}</h5>
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
                    <a href="">My Lease</a>
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
                                        <!-- <th>Progress</th> -->
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



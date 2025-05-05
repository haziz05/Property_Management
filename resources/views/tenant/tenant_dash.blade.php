@extends('adminlte::page')

@section('title', 'My Dashboard')

@section('content_header')  
    <h1>Welcome {{$user_name}}</h1>
@stop

@section('content')
<div class="container-fluid">
    <!--My Properties Card -->
    <div class="card mb-4">
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
                    <h5>Leasing: {{$person['area']}} sq ft</h5>
                    <h5>Description: {{$property['description']}}</h5>
                </div>

                <div class="col-md-4">
                    <h5 class="btn btn-primary">Contact a Manager</h5>
                </div>
            </div>
        </div>
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

                    </div>
                </div>
          </div>
    </div>
</div>
@stop



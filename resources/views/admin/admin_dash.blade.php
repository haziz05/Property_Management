<!DOCTYPE html>
@include('header')
@include('layouts.topNav')
<div id="layoutSidenav">
    @include('layouts.sideNav')

    <!------------------------------------------ Dashboard Screen ----------------------------------------->
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Welcome {{$user_name}}</li>
                </ol>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <a href="{{ route('maintenance') }}">Maintenance Issues</a>
                            </div>
                            <!--This is where to add divs-->
                            <div class="card-body">
                                <table style="width:120%" >
                                    <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Level of Issue</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($issues as $issue)
                                        <tr>
                                            <td>{{$issue['address']}}</td>
                                            <td>{{$issue['severity']}}</td>
                                            <td>{{$issue['description']}}</td>
                                        </tr>                                              
                                        @endforeach
                                    </tbody>

                                </table>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                <a href="{{ route('currentTenant') }}">Tenants</a>
                            </div>
                            <!--This is where to add divs-->
                            <div class="card-body">
                                <table style="width:120%" >
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
                                            <td>{{$person['name']}}</td>
                                            <td>{{$person['phone']}}</td>
                                            <td>{{$person['email']}}</td>
                                        </tr>                                              
                                        @endforeach
                                    </tbody>

                                </table>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>

                        <a href="{{ route('listings') }}">Properties</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
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
                                    <td>{{$property['Address']}}</td>
                                    <td>{{$property['size']}}</td> 
                                    <td>{{$property['description']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Address</th>
                                    <th>Leasable Area</th>
                                    <th>Description</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>



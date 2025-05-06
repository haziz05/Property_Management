@extends('adminlte::page')

@section('title', 'My Maintenace')

@section('content_header')
    <h1>My Maintenace</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('tenant_dash') }}">My Dashboard</a></li>
        <li class="breadcrumb-item active">My Maintenance</li>
    </ol>
@stop


@section('content')
<div class="container-fluid">

    <!-- Queries Card -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Maintenance Issues
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Query #</th>
                            <th>Address</th>
                            <th>Severity of Issue</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Preferred Form of Contact</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myQueries as $query)
                        <tr>
                            <td>
                                <strong>{{$query['query_number']}}</strong>
                                <a href="{{ route('tenantQueries', ['id' => $query['id']]) }}">Edit</a>
                            </td>
                            <td>{{$query['address']}}</td>
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
                            <td>{{$query['description']}}</td>
                            <td>{{$query['date']}}</td>
                            <td>{{$query['contact']}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>

    <!-- Adding Query Card -->
    <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus"></i>
                Add Query
            </div>

            <div class="card-body">
                <form action="{{ route('addTQueries')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Turn this into a select -->
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="address" name="address" aria-placeholder="Please select a property">
                                @foreach($properties as $property)
                                    <option value="{{ $property['Address'] }}">{{ $property['Address']}}</option>
                                @endforeach
                            </select>
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
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
                            @error('severity')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Provide a Description">
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date" name='date'>
                            @error('date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Email">
                            @error('contact')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add Query</button>
                    </div>


                </form>
            </div>
        </div>
</div>
@stop

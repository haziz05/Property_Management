@extends('adminlte::page')

@section('title', 'My Maintenace')

@section('content_header')
    <h1>My Maintenace</h1>
@stop


@section('content')
<div class="container-fluid">
    <!-- Queries Card -->
    <div class="container-fluid">
        <h1 class="mt-4">Maintenance Queries</h1><br><br>
        

        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-exclamation"></i>
                Queries
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
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
                            <th>{{$query['query_number']}} <a href="{{ route('tenantQueries', ['id' => $query['id']]) }}">Edit</a></th>
                            <th>{{$query['address']}}</th>
                            <th>{{$query['severity']}}</th>
                            <th>{{$query['description']}}</th>
                            <th>{{$query['date']}}</th>
                            <th>{{$query['contact']}}</th>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fa-solid fa-plus"></i>
                Add
            </div>

            <div class="card-body">
                <!--Adding Form-->
                <form action="{{ route('addTQueries')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="{{$property['Address']}}">
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
                        <label for="inputName" class="col-sm-2 col-form-label">Phone or Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Phone or Email">
                            @error('contact')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add Query</button>
                    </div>


                </form>
                <!--Adding Form-->
            </div>
            
            
        </div>


        
    </div>

</div>
@stop

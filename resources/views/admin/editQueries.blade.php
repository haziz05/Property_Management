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
                <h1 class="mt-4">Edit</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a> /<a href="{{ route('maintenance') }}">Maintenance</a> /Edit Queries</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Update Query</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateQuery') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$query['id']}}">

                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{$query['address']}}">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="severity" class="col-sm-2 col-form-label">Severity</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="severity" name="severity" value="{{$query['severity']}}">
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description" value="{{$query['description']}}">
                                    @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date" value="{{$query['date']}}">
                                    @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="contact" name="contact" value="{{$query['contact']}}">
                                    @error('contact')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        
                        </form> 
                        
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('removeQuery', ['id' => $query['id']] ) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this query?')">Delete Query</a>
                    </div>
                    
                </div>

            </div>
        </main>

        @include('footer')
    </div>
</div>


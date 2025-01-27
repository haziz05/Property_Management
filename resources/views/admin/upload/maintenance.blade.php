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
                <h1 class="mt-4">Upload Maintenance File</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Upload Maintenance File</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Upload
                    </div>
                
                    <div class="card-body">
                        <!--Adding Form-->
                        <form action="{{ route('uploadMaintenanceFile') }}" method = "POST" enctype = "multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="queryNumber" class="col-sm-2 col-form-label">Query Number</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="queryNumber" name="queryNumber">
                                        <option value="">Select Query</option>
                                        @foreach($issues as $issue)
                                        <option value="{{$issue['query_number']}}">{{$issue['query_number']}}</option>
                                        @endforeach
                                    </select>
                                    @error('queryNumber')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-2 col-form-label">Tenant Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputName" name="inputName">
                                        <option value="">Select Tenant</option>
                                        @foreach($persons as $person)
                                        <option value="{{$person['name']}}">{{$person['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('Tenant')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="property" class="col-sm-2 col-form-label">Property</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="property" name="property">
                                        <option value="">No Property</option>
                                        @foreach($properties as $property)
                                        <option value="{{$property['id']}}">{{$property['Address']}}</option>
                                        @endforeach
                                    </select>
                                    @error('property')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name='email'>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date">
                                    @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="file" class="col-sm-2 col-form-label">Select File</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="file" name="file[]" accept=".jpg,.pdf" multiple>
                                    @error('file')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                        <!--Adding Form-->
                    </div>
                    
                    
                </div>                   
            </div>
        </main>

        @include('footer')
    </div>
</div>

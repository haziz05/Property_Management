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
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a> /<a href="{{ route('editTScreen') }}">Edit Tenant</a> /Update</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Update
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('updateTenant') }}" method="POST" class="container mt-4">
                            @csrf
                            <input type="hidden" name="id" value="{{$person['id']}}">

                            <div class = "mb-3 row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Name" name="Name" value="{{$person['name']}}">
                                    @error('Name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="property_id" class="col-sm-2 col-form-label">Property ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="property_id" name="property_id" value="{{$person['property_id']}}">
                                    @error('property_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="area" class="col-sm-2 col-form-label">Occupying Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="area" name="area" value="{{$person['area']}}">
                                    @error('area')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$person['phone']}}">
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="{{$person['email']}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>


                        </form> 
                    </div>
                </div> 
            </div>
        </main>

        @include('footer')
    </div>
</div>


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
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Edit Tenant</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Add
                    </div>
                
                    <div class="card-body">
                        <!--Adding Form-->
                        <form action="{{ route('addTenant') }}" method = "POST" enctype = "multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" name="Name">
                                    @error('Name')
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
                                <label for="area" class="col-sm-2 col-form-label">Occupying Area</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="area" name="area">
                                    @error('area')
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
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Tenant</button>
                            </div>
                        </form>
                        <!--Adding Form-->
                    </div>
                    
                    
                </div>

                <div class="containter">
                <div class="mt-5">
                    @foreach($persons as $person)
                    <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">

                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                {{$person['name']}}
                                </h4>
                            </div>

                            <div class="col-12 col-md-4 text-center">
                                <a 
                                    href="{{ route('editTenant', ['tenant_id' => $person['id']]) }}"
                                    class="f-n-hover btn btn-primary btn-raised px-4 py-25 w-75 text-600">
                                    Edit
                                </a>
                            </div>

                            <div class="col-12 col-md-4 text-center">
                                <a 
                                    href="{{ route('removeTenant', ['tenant_id' => $person['id']]) }}" 
                                    onclick="return confirm('Are you sure you want to remove this tenant?')" 
                                    class="f-n-hover btn btn-remove btn-raised px-4 py-25 w-75 text-600">
                                    Remove
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                </div>


                
            </div>
        </main>

        @include('footer')
    </div>
</div>


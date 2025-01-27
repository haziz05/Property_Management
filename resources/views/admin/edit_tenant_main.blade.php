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

                <div class="row">

                    @foreach($persons as $person)
                    <div class="d-flex  col-md-5 mb-5" style="border: solid; border-radius: 20px ;margin-right:120px; padding:10px">
                        <div>
                            <tr>
                            <h4>{{$person['name']}}</h4>
                            <h6><a href="{{ route('removeTenant', ['tenant_id' => $person['id']]) }}" onclick="return confirm('Are you sure you want to remove this Tenant?')">Remove</a></h6>
                            <h6><a href="{{ route('editTenant', ['tenant_id' => $person['id']]) }}">Edit</a></h6>
                            </tr> 
                        </div>                               
                    </div>
                    @endforeach

                </div>


                
            </div>
        </main>

        @include('footer')
    </div>
</div>


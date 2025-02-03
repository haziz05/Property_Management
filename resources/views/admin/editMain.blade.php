<!--Editing Listings-->
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
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Edit</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Add
                    </div>

                    <div class="card-body">
                        <!--Adding Form-->
                        <form action="{{ route('addProperty') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name='address' placeholder="Enter Property Address">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="size" class="col-sm-2 col-form-label">Size</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="size" name="size" placeholder="Enter Property Size">
                                    @error('size')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Property Description">
                                    @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Data</button>
                            </div>
                            
                        </form>
                    <!--Adding Form-->
                    </div>
                    
                    
                </div>

                    <div class="container">
                    <div class="mt-5">
                        @foreach($properties as $property)
                        <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4">
                                    <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                    {{$property['Address']}}
                                    </h4>

                                    <div class="text-secondary-d1 text-120">
                                        {{$property['size']}} sq ft
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                    <a
                                        href="{{ route('editProperty', ['property_id' => $property['id']]) }}"
                                        class="f-n-hover btn btn-primary btn-raised px-4 py-25 w-75 text-600">
                                        Edit
                                    </a>
                                </ul>

                                <div class="col-12 col-md-4 text-center">
                                    <a 
                                        href="{{ route('removeProperty', ['property_id' => $property['id']]) }}" 
                                        onclick="return confirm('Are you sure you want to remove this property?')" 
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

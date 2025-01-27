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

                <div class="row">
                    @foreach($properties as $property)
                    <div class="d-flex  col-md-5 mb-5" style="border: solid; border-radius: 20px ;margin-right:120px; padding:10px">
                        <div>
                            <h4>{{$property['Address']}}</h4>
                            <h6><a  href="{{ route('removeProperty', ['property_id' => $property['id']]) }}" onclick="return confirm('Are you sure you want to remove this property?')">Remove</a></h6>
                            <h6><a  href="{{ route('editProperty', ['property_id' => $property['id']]) }}">Edit</a></h6>
                        </div>      
                    </div>
                    @endforeach
                </div>
            </div>
        </main>

        @include('footer')
    </div>
</div>  

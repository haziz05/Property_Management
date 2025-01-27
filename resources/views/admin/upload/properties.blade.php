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
                <h1 class="mt-4">Upload Property File</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Upload Property File</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Upload
                    </div>
                
                    <div class="card-body">
                        <!--Adding Form-->
                        <form action="{{ route('uploadPropertyFile') }}" method = "POST" enctype = "multipart/form-data">
                            @csrf

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
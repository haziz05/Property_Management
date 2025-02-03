<!DOCTYPE html>

@include('header')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />    

@include('layouts.topNav')
<div id="layoutSidenav">
    @include('layouts.sideNav')

    <!------------------------------------------ Dashboard Screen ----------------------------------------->
    <div id="layoutSidenav_content">
        @section('content')
        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Listings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Listings</li>
                </ol>

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
                                <li>
                                    <i class=" text-success-m2 text-110 mr-2 mt-1"></i>
                                    <span>
                                    {{$property['description']}}
                                    </span>
                                </li>

                                
                            </ul>

                            <div class="col-12 col-md-4 text-center">
                                <a href="{{ route('manageProperty', ['id' => $property['id']]) }}" class="f-n-hover btn btn-manage btn-raised px-4 py-25 w-75 text-600">Manage Property</a>
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

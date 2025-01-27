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
                <h1 class="mt-4">Listings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Listings</li>
                </ol>
                
                <div class="row">

                    @foreach($properties as $property)
                    <div class="d-flex  col-md-5 mb-5" style="border: solid; border-radius: 20px ;margin-right:120px; padding:10px">
                        <div>
                            <h4>{{$property['Address']}}</h4>
                            <h6>This property is {{$property['size']}} sq ft</h6>
                            <h6>Description{{$property['monthly_rental']}}</h6>
                            <h6><a href="{{ route('manageProperty', ['id' => $property['id']]) }}">Property Management</a></h6>


                        </div>

                        
                    </div>
                    @endforeach

                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>

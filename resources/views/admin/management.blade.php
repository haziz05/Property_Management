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
                <h1 class="mt-4">Management</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/{{$property['Address']}}</li>
                </ol>
                
                <div>

                    <h1>{{$property['Address']}}</h1>
                    <h1>Currently {{$total_area}}% of the leasable area is being occupied</h1>
                    <br><br>
                    <h4>Information:</h4>
                    <h5>The total leasable area of this property is {{$property['size']}} sq ft</h5>
                    <h5>Description: {{$property['description']}}</h5>
                    

                    <br><br>
                    <h1>Current Tenanats:</h1>
                    @foreach($occupied_tenants as $tenant)
                    <h2><a href="{{ route('currentTenant') }}">{{$tenant['name']}}</a>, currently occupying {{$tenant['area']}} sq ft</h2>                        
                    @endforeach

                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>


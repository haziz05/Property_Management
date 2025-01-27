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
                <h1 class="mt-4">Current Tenants</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Current Tenants</li>
                </ol>
                
                <div class="row">

                    @foreach($persons as $person)
                    <div class="d-flex  col-md-5 mb-5" style="border: solid; border-radius: 20px ;margin-right:120px; padding:10px">
                        <div>
                            <h4>{{$person['name']}}</h4>
                            <h6>Tenant phone number is: {{$person['phone']}}</h6>
                            <h6>Tenant email is: {{$person['email']}}</h6>

                        </div>

                        
                        
                    </div>
                    @endforeach

                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>

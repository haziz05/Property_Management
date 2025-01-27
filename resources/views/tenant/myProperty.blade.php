<!DOCTYPE html>

@include('header')

@include('layouts.topNav')
<div id="layoutSidenav">
    @include('layouts.sideNavT')

    <!------------------------------------------ Dashboard Screen ----------------------------------------->
    <div id="layoutSidenav_content">
        @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">My Property</h1><br><br>
                

                <h1>{{$property['Address']}}</h1>
                <h5>Leasing: {{$person['area']}} sq ft.</h5>
                <h5>Monthly Payment:</h5>
                <h5>Outstanding Balance:</h5>
                <br><br><br>

                <h4>Property Updates:</h4>
                
            </div>
        </main>
        @include('footer')
    </div>
</div>

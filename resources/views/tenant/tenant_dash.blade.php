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
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Welcome {{$user_name}}</li>
                </ol>
            
            </div>
        </main>
        @include('footer')
    </div>
</div>



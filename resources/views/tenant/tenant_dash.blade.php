@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')  
    <h1>Tenant Dashboard</h1>
@stop

@section('content')
<div id="layoutSidenav">

    <!------------------------------------------ Dashboard Screen ----------------------------------------->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Welcome {{$user_name}}</li>
                </ol>
            
            </div>
        </main>
    
    </div>
</div>
@stop



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
                <h1 class="mt-4">Select Tenant Files</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="{{ route('admin_dash') }}">Dashboard</a>/Select Tenant Files</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Select File
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Tenant Name</th>
                                    <th>Property Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date Uploaded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td><a href="{{ route('viewTenantFiles', $file->id) }}" target="_blank">{{ $file['fileName'] }}</a></td>
                                    <td>{{ $file['name'] }}</td>
                                    <td>{{ $file['address'] }}</td>
                                    <td>{{ $file['phone'] }}</td>
                                    <td>{{ $file['email'] }}</td>
                                    <td>{{ $file['date'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>                   
            </div>
        </main>

        @include('footer')
    </div>
</div>


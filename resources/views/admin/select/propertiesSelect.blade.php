@extends('adminlte::page')

@section('title', 'Select Property Files')

@section('content_header')
    <h1>Select Property Files</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Select Property Files</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-plus"></i> Select File
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Property Address</th>
                            <th>Date Uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td>
                                <a href="{{ route('viewPropertyFiles', $file->id) }}" target="_blank">
                                    {{ $file['fileName'] }}
                                </a>
                            </td>
                            <td>{{ $file['address'] }}</td>
                            <td>{{ $file['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
@stop



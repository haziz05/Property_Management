@extends('adminlte::page')

@section('title', 'Upload Property File')

@section('content_header')
    <h1>Upload Property File</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Upload Property File</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa-solid fa-plus"></i> Upload
        </div>
        <div class="card-body">
            <form action="{{ route('uploadPropertyFile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="property" class="col-sm-2 col-form-label">Property</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="property" name="property">
                            <option value="">No Property</option>
                            @foreach($properties as $property)
                                <option value="{{ $property['id'] }}">{{ $property['Address'] }}</option>
                            @endforeach
                        </select>
                        @error('property')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="file" class="col-sm-2 col-form-label">Select File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="file" name="file[]" accept=".jpg,.pdf" multiple>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@stop
@extends('adminlte::page')

@section('title', 'Upload Maintenance File')

@section('content_header')
    <h1>Upload Maintenance File</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin_dash') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Upload Maintenance File</li>
    </ol>
@stop

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-upload"></i> Select File
        </div>
        <div class="card-body">
            <form action="{{ route('uploadMaintenanceFile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="queryNumber" class="col-sm-2 col-form-label">Query Number</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="queryNumber" name="queryNumber">
                            <option value="">Select Query</option>
                            @foreach($issues as $issue)
                                <option value="{{ $issue['query_number'] }}">{{ $issue['query_number'] }}</option>
                            @endforeach
                        </select>
                        @error('queryNumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tenant Name</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="inputName" name="inputName">
                            <option value="">Select Tenant</option>
                            @foreach($persons as $person)
                                <option value="{{ $person['name'] }}">{{ $person['name'] }}</option>
                            @endforeach
                        </select>
                        @error('inputName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="property" class="col-sm-2 col-form-label">Property</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="property" name="property">
                            <option value="">No Property</option>
                            @foreach($properties as $property)
                                <option value="{{ $property['Address'] }}">{{ $property['Address'] }}</option>
                            @endforeach
                        </select>
                        @error('property')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                            
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
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
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="file[]" accept=".jpg,.pdf" multiple>
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        <script>
                            document.getElementById('file').addEventListener('change', function(){
                                var fileNames = Array.from(this.files).map(f => f.name).join(', ');
                                this.nextElementSibling.textContent = fileNames || 'Choose file';
                            });
                        </script>
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
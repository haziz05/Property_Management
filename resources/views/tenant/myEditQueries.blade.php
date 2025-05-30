@extends('adminlte::page')

@section('title', 'Edit Query')


@section('content_header')
    <h1>Eidt Query</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('tenant_dash') }}">My Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tenantQueryScreen') }}">My Maintenace</a></li>
        <li class="breadcrumb-item active">Edit Query</li>
    </ol>
@stop

<!-- Update Query Card -->
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-pen"></i>
            Update Query
        </div>

        <div class="card-body">
            <form id="updateTQueriesForm" action="{{ route('updateTQueries') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-controller" id="id" name="id" value="{{$query['id']}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="address" name="address">
                            <option value="{{ $curr_property['Address'] }}">{{ $curr_property['Address'] }}</option>
                            @foreach($properties as $property)
                            <option value="{{ $property['Address'] }}">{{ $property['Address'] }}</option>
                            @endforeach
                        </select>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="severity" class="col-sm-2 col-form-label">Severity</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="severity" name="severity">
                            <option selected value="{{ $query['severity'] }}">{{ $query['severity'] }}</option>
                            @if($query['severity'] !== 'High')
                                <option value="High">High</option>
                            @endif
                            @if($query['severity'] !== 'Medium')
                                <option value="Medium">Medium</option>
                            @endif
                            @if($query['severity'] !== 'Low')
                                <option value="Low">Low</option>
                            @endif
                        </select>
                        @error('severity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" value="{{$query['description']}}">
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" value="{{$query['date']}}">
                        @error('date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="contact" class="col-sm-2 col-form-label">Contact Info</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contact" name="contact" value="{{$query['contact']}}">
                        @error('contact')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button> 
                </div>
            </form> 
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('removeTQuery', ['id' => $query['id']]) }}" 
                class="btn btn-danger remove-property">
                Delete Query
            </a>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.remove-property').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); 
                const url = this.getAttribute('href'); 

                Swal.fire({
                    title: 'Are you sure you want to delete this query?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });

        // SweetAlert for update
        const updateForm = document.getElementById('updateTQueriesForm');
        updateForm.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to update this query?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    updateForm.submit();
                }
            });
        });
    });
</script>
@stop

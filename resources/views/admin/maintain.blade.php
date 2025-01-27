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
                <h1 class="mt-4">Maintenance</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href='/dashboard'>Dashboard</a>/Maintenance</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-exclamation"></i>
                        Queries
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Query #</th>
                                    <th>Address</th>
                                    <th>Severity of Issue</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Preferred Form of Contact</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($issues as $issue)
                                <tr>
                                    <th>{{$issue['query_number']}} <a href="{{ route( 'query', ['id' => $issue['id']] ) }}">Edit</a></th>
                                    <th>{{$issue['address']}}</th>
                                    <th>{{$issue['severity']}}</th>
                                    <th>{{$issue['description']}}</th>
                                    <th>{{$issue['date']}}</th>
                                    <th>{{$issue['contact']}}</th>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>



                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-plus"></i>
                        Add
                    </div>

                    <div class="card-body">
                        <!--Adding Form-->
                        <form action="{{ route('addQuery') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="mb-3 row">
                                <label for="Address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Property Address">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="severity" class="col-sm-2 col-form-label">Severity of Issue</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="severity" name="severity" >
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Provide a Description of the issue">
                                    @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" name="date">
                                    @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-2 col-form-label">Phone or Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="contact" name='contact' placeholder="Phone or Email">
                                    @error('contact')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Query</button> 
                            </div>

                        


                        </form>
                        <!--Adding Form-->
                    </div>
                    
                    
                    
                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>


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
                
                <div class="containter">
                <div class="mt-5">
                    @foreach($persons as $person)
                    <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm">

                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                                {{$person['name']}}
                                </h4>
                            </div>

                            <ul class="list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">
                                <li>
                                    <i class=" text-success-m2 text-110 mr-2 mt-1"></i>
                                    <span>
                                    {{$person['phone']}}
                                    </span>        
                                </li>

                                <li>
                                    <i class=" text-success-m2 text-110 mr-2 mt-1"></i>
                                    <span>
                                    {{$person['email']}}
                                    </span>
                                </li>
                            </ul>

                            <div class="col-12 col-md-4 text-center">
                                <a 
                                    href="{{ route('removeTenant', ['tenant_id' => $person['id']]) }}" 
                                    onclick="return confirm('Are you sure you want to remove this tenant?')" 
                                    class="f-n-hover btn btn-remove btn-raised px-4 py-25 w-75 text-600">
                                    Remove
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </main>
        @include('footer')
    </div>
</div>

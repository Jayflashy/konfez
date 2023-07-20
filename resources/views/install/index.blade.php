
@extends('install.layout')
@section('title') Installation @endsection

@section('content')
<div class="card">    
    <div class="card-header text-center">
        <h4 class="fw-bold">KONFEZ Anonymous Installation</h4>        
    </div>

    <div class="card-body"> 
        <div class="text-center">
            <p>The installation process should take less than 5 minutes. Thank you for choosing to use the product. Please give us reviews to enable us serve you better.</p>
            <p>You will need to know the following items before proceeding.</p>
        </div>

        <ol class="list-group mb-2">
            <li class="list-group-item fw-medium"><i class="fa fa-check"></i> Codecanyon purchase code</li>
            <li class="list-group-item fw-medium"><i class="fa fa-check"></i> Database Name</li>
            <li class="list-group-item fw-medium"><i class="fa fa-check"></i> Database Username</li>
            <li class="list-group-item fw-medium"><i class="fa fa-check"></i> Database Password</li>
            <li class="list-group-item fw-medium"><i class="fa fa-check"></i> Database Hostname</li>
        </ol>

        <p>If you don't have this information, then you will need to contact your host before you can continue.</p>
        <br>

        <div class="text-center">
            <a href="{{ route('install.agreement') }}" class="btn btn-primary text-white">
                Start Installation
            </a>
        </div>
        
    </div>
</div>
@endsection
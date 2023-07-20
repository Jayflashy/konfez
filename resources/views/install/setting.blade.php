@extends('install.layout')
@section('title') Setting @endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="fw-bold mb-0">Site Setup</h4>
    </div>
    <div class="card-body">
        <p class="text-center small">Fill this form with basic site information & admin login credentials.</p>
        @include('alerts.alerts')
        <form class="" method="POST" action="{{ route('install.setup') }}">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label"  for="admin_name">Admin Name</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" required>
                </div>    
                <div class="form-group col-md-6">
                    <label class="form-label"  for="admin_email">Admin Email</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label"  for="admin_username">Admin Username</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label"  for="admin_password">Admin Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                </div>
            </div>
            <hr>
            <h5 class="strong">Site Settings</h5>
            <p>Fil in your website details.</p>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="system_name">Site Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="system_email">Site Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <input type="text" name="app_url" value="{{url('/')}}" id="" hidden>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Finish Installation</button>
            </div>
        </form>
    </div>
</div>

@endsection
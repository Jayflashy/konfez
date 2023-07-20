@extends('install.layout')
@section('title') Database @endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="fw-bold">Database Setup</h4>
    </div>
    <div class="card-body">
        @include('alerts.alerts')
        <form method="POST" action="{{ route('install.savedb') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="db_host">Database Host</label>
                <input type="text" class="form-control" id="db_host" name = "DB_HOST" required autocomplete="off">
                <input type="hidden" name = "types[]" value="DB_HOST">
            </div>
            <div class="form-group">
                <label class="form-label" for="db_name">Database Name</label>
                <input type="text" class="form-control" id="db_name" name = "DB_DATABASE" required autocomplete="off">
                <input type="hidden" name = "types[]" value="DB_DATABASE">
            </div>
            <div class="form-group">
                <label class="form-label" for="db_user">Database Username</label>
                <input type="text" class="form-control" id="db_user" name = "DB_USERNAME" required autocomplete="off">
                <input type="hidden" name = "types[]" value="DB_USERNAME">
            </div>
            <div class="form-group">
                <label class="form-label" for="db_pass">Database Password</label>
                <input type="password" class="form-control" id="db_pass" name = "DB_PASSWORD" autocomplete="off">
                <input type="hidden" name = "types[]" value="DB_PASSWORD">
            </div>
            <div class="text-center mt-3">
                <b>Note: Database uploading process may take few minutes...</b> <br>
                <button  class="btn btn-primary text-light" type="submit"> Next Step</button>
            </div>
            
        </form>
    </div>
</div>

@endsection
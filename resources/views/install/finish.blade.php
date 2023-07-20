@extends('install.layout')

@section('title')Install Successful @endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="strong">Installation Successful</h4>
    </div>
    <div class="card-body">
        <h1 class="h3">Congratulations!!!</h1>
        <p>You have successfully completed the installation process. Please Login to continue.</p>
        <div class="mb-3">
            <h6 class="strong text-uppercase">Configure the following setting to run the system properly.</h6>
            <ul class="list-group">
                <li class="list-group-item">Post Settings</li>
                <li class="list-group-item">SMTP Setting</li>
                <li class="list-group-item">Features Activation </li>
                <li class="list-group-item">Site Settings</li>
            </ul>
        </div>
        <div class="mb-3">
            <h4 class="card-title">Login details</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$request->admin_name}}</td>
                        <td>{{$request->admin_email}}</td>
                        <td>{{$request->admin_password}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a href="{{ route('index') }}" class="btn btn-primary">View Website</a>
            <a href="{{ route('index') }}/admin/login" class="btn btn-success my-2">Admin Login</a>
        </div>

        <hr>
        <p class="mt-4">
            <b>Support and Questions</b>
            <br>
            If you need support, please send me an email using the contact form on my envato user page. I usually respond to support requests within 24 hours so please feel free to contact me with
            problems of any kind or even simple questions, I don't mind responding.
            <br>
            <a href="https://codecanyon.net/user/jadesdeveloper" target="_blank" rel="nofollow">https://codecanyon.net/user/jadesdeveloper</a>
        </p>

    </div>
</div>
      
@endsection

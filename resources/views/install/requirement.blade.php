@extends('install.layout')
@section('title')Requirements @endsection

@section('content')

<div class="card card-bordered">
    <div class="card-header text-center">
        <h4 class="fw-bold">Installation Requirements</h4>        
    </div>

    <div class="card-body">
        <p>Make sure everything is checked so that you do not run into problems.</p>
        @foreach($results['extensions'] as $type => $extension)
            <div class="list-group list-group-flush {{ $loop->index == 0 ? 'mb-3 mt-3' : 'mt-3 mb-3 pt-3' }}">
                <div class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="fw-bold">{{ mb_strtoupper($type) }}</span>
                            @if($type == 'php')
                                {{ config('install.php_version') }}+
                            @endif
                        </div>

                        <div class="col-auto d-flex align-items-center">
                            @if($type == 'php')
                                @if(version_compare(PHP_VERSION, config('installer.php_version')) >= 0)
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-close text-danger"></i>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                @foreach($extension as $name => $enabled)
                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="fw-bold"> {{ $name }} </span>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                @if($enabled)
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-close text-danger"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        @if(isset($results['errors']) == false)
        <div class="text-center">
            <a href="{{route('install.database')}}"  class="btn btn-primary">Next Step</a>
        </div>            
        @else
        <div class="text-center">
            <a href="{{route('install.requirement')}}"  class="btn btn-danger" >Reload</a>
        </div>  
        @endif
    </div>   
</div>

@endsection
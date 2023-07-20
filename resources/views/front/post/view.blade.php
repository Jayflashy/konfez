@extends('front.layouts.master')
@section('title') {{$post->title}} @endsection
@section('meta')
<!-- Open Graph / Facebook -->
    <meta property="og:type" content="Website" >
    <meta property="og:title" content="@yield('title') | {{get_setting('title')}}" >
    <meta property="og:image" content="{{uploaded_asset(get_setting('logo'))}}" >
    <meta property="og:description" content="{{$post->content}} " >
    <meta property="og:site_name" content="{{get_setting('title') }}" >

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title') | {{get_setting('title')}}">
    <meta name="twitter:description" content="{{$post->content}}  ">
    <meta name="twitter:image" content="{{ uploaded_asset(get_setting('logo')) }}">   
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h5 class="page-title "> {{$post->title}}</h5>
        <div class="card mb-1" id="Post">
            <div class="panel">
                {{-- <div class="panel-header bg-primary text-white">
                    {{$post->category->name}}
                    <small class="smalls">{{$post->created_at->diffForHumans()}}</small>
                </div> --}}
                <div class="panel-body">
                    <p>{{$post->content}}</p>

                    <div class="justify-content-space-between mt-4">
                        <span> <i class="las la-folder-open"></i> <a class="text-lowercase me-2" href="{{route('view.category',$post->category->slug)}}">{{$post->category->name}}</a> </span>
                        <small class="smalls">{{$post->created_at->diffForHumans()}}</small>
                    </div>

                </div>
                <div class="panel-footer">
                    <div>
                        <span class="ms-0 btn-sm panel-text"><b>{{$post->postview()}} </b>@lang('Views')</span> 
                    </div>
                    <div id="share">
                        {{-- <button class="btn btn-sm btn-outline-success">
                            <i class="fa fa-thumbs-up"></i> {{$post->likes()}}
                        </button> --}}
                        <a href="#" class="btn-sm btn-outline-primary btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-share-alt"> </i> <span class="panel-share">@lang('Share')</span> 
                        </a>
                        <div class="dropdown-menu sh">                                               
                            <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{route('view.post', $post->slug)}}&t={{$post->title}}" target="_blank">
                                Facebook
                            </a>
                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{$post->title}}&url={{route('view.post', $post->slug)}}"  target="_blank">
                                Twitter
                            </a> 
                            <a class="dropdown-item" href="whatsapp://send?text= {{$post->title}} - {{route('view.post', $post->slug)}}" target="_blank">
                                Whatsapp
                            </a> 
                            <a class="dropdown-item" type="button" onclick="copyLink('con{{$post->id}}')">
                                <p class="d-none" id="con{{$post->id}}">{{$post-> title}} {{route('view.post', $post->slug)}}</p>
                                @lang('Copy')
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="comments">
            <div class="card-header py-0">
                <h5>@lang('Comments')</h5>
                <span class="badge badge-pill bg-info fw-bold"> {{$comments->count()}}</span> 
            </div>            
            <div class="card-body py-1">
                <div class="panel">
                    @include('alerts.alerts')
                    <form class="panel-body" action="{{route('comment.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="user_id" value=" @auth{{Auth::user()->id}} @endauth">
                        <textarea class="form-control bml" name="comment" id="" rows="3" minlength="{{sys_setting('minimum_comment')}}" maxlength="{{sys_setting('max_comment')}}"></textarea>
                        <div class="text-end my-2">
                            <button class="btn btn-primary" type="submit">@lang('Comment')</button>                            
                        </div>    
                    </form>
                </div>
                <hr class="mt-0">
                @forelse ($comments as $item)
                    @if ($item->status == 1)
                    <div class="panel">
                        <div class="row panel-body">
                            <div class="col-1 com-icon">
                                <i class="btn-light la la-user la-2x mt-3"></i>
                            </div>
                            <div class="col-md-11 col-10">
                                <p>{{$item->comment}}</p>
                                <hr class="mb-0">
                                <small class="smalls">{{$item->created_at->diffForHumans()}}</small>
                            </div>                        
                        </div>
                    </div>
                    @endif                
                @empty
                <div class="panel">
                    <div class="panel-body text-center">
                        <div class="display-1 text-muted mb-2"><i class="la la-comment"></i></div>
                        @lang('No Comment Found')                        
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('front.side')            
    </div>
</div>
@endsection
@extends('front.layouts.master')
@section('title') @lang('My Messages') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="sidebar stickyfill">
            @include('front.layouts.sidenav')
        </div>
    </div>
    <div class="col-lg-9">
        <h4 class="page-title">@lang('My Messages')</h4>
        <div class="card">
            <div class="card-body" id="almes">
                @forelse ($messages as $item)
                <div class="panel">
                    <div class="panel-body">
                        <p>{{$item->message}}</p>
                    </div>
                    <div class="panel-footer">
                        <span>{{$item->created_at}}</span>
                        <div>
                            <a href="{{route('user.message_report', $item->id)}}" class="btn-sm btn-outline-danger btn">
                                <i class="la la-flag"> </i> <span class="panel-share"> @lang('Report')</span> 
                            </a>  
                            <a href="#" class="btn-sm btn-outline-success btn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-share-alt"> </i> <span class="panel-share">@lang('Share')</span> 
                            </a>
                            <div class="dropdown-menu sh">                                               
                                <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{url('/send/'.$item->user->username)}}&t={{$item->message}}" target="_blank">
                                    Facebook
                                </a>
                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{$item->message}}&url={{url('/send/'.$item->user->username)}}"  target="_blank">
                                    Twitter
                                </a> 
                                <a class="dropdown-item" href="whatsapp://send?text= {{$item->message}} - {{url('/send/'.$item->user->username)}}" target="_blank">
                                    Whatsapp
                                </a> 
                                <a class="dropdown-item" type="button" onclick="copyLink('con{{$item->id}}')">
                                    <p class="d-none" id="con{{$item->id}}">{{$item->message}} {{url('/send/'.$item->user->username)}}</p>
                                    @lang('Copy')
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="panel text-center">
                    <div class="panel-header">
                        <h5>@lang('No message found!')</h5>
                    </div>
                    <div class="panel-body">
                        <p>@lang("Oops! No message found. Please share your profile below")</p>
                        <div class="share mt-2">
                            <a href="https://www.facebook.com/sharer.php?u={{url('/send/'.Auth::user()->username)}}&t=@lang('Send') {{Auth::user()->username}} @lang('anonymous message')" type="button" class="btn facebook mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a onclick="copyLink('shareng')" type="button" class="btn btn-secondary mx-1">
                                <p class="d-none" id="shareng">@lang('Send') {{Auth::user()->username}} @lang('anonymous message') - {{url('/send/'.Auth::user()->username)}}</p>
                                <i class="fa fa-clipboard"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text=@lang('Send') {{Auth::user()->username}} @lang('anonymous message')&url={{url('/send/'.Auth::user()->username)}}" type="button" class="btn twitter mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="whatsapp://send?text= @lang('Send') {{Auth::user()->username}} @lang('anonymous message') - {{url('/send/'.Auth::user()->username)}}" type="button" class="btn whatsapp mx-1">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="ajax-load text-center mb-2">
                <button class="btn btn-primary btn-sm" onclick="loadMore()">{{('Load More')}}</button>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body text-center">
                <p>@lang("Please share your profile below")</p>
                <div class="share mt-2">
                    <a href="https://www.facebook.com/sharer.php?u={{url('/send/'.Auth::user()->username)}}&t=@lang('Send') {{Auth::user()->username}} @lang('anonymous message')" type="button" class="btn facebook mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a onclick="copyLink('shareng')" type="button" class="btn btn-secondary mx-1">
                        <p class="d-none" id="shareng">@lang('Send') {{Auth::user()->username}} @lang('anonymous message') - {{url('/send/'.Auth::user()->username)}}</p>
                        <i class="fa fa-clipboard"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=@lang('Send') {{Auth::user()->username}} @lang('anonymous message')&url={{url('/send/'.Auth::user()->username)}}" type="button" class="btn twitter mx-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="whatsapp://send?text= @lang('Send') {{Auth::user()->username}} @lang('anonymous message') - {{url('/send/'.Auth::user()->username)}}" type="button" class="btn whatsapp mx-1">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var page = 1;
    function loadMore(){
        page++;        
        loadMoreData(page);
    }
	function loadMoreData(page){
	    $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            // $('.ajax-load').hide();
	            $("#almes").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
                $('.ajax-load').html("No more records found");
                $('.ajax-load').hide();
	        });
	}

    
    // Copy share button
    function copyLink(elementId) {
        // Create a "hidden" input
        var aux = document.createElement("input");

        // Assign it the value of the specified element
        aux.setAttribute("value", document.getElementById(elementId).innerHTML);

        // Append it to the body
        document.body.appendChild(aux);

        // Highlight its content
        aux.select();

        // Copy the highlighted text
        document.execCommand("copy");

        // Remove it from the body
        document.body.removeChild(aux);

    }
    </script>
@endsection
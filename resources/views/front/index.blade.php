@extends('front.layouts.master')
@section('title') {{get_setting('title')}} @endsection
@section('meta')
    
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body" id="alpos">
                @forelse ($posts as $post)
                <div class="panel">
                    <a class="panel-header bg-primary text-white" href="{{route('view.post', $post->slug)}}" type="button">
                        {{$post->title}}
                        <small class="smalls">{{$post->created_at->diffForHumans()}}</small>
                    </a>
                    <div class="panel-body">
                        <p>{{$post->content}}</p>
                    </div>
                    <div class="panel-footer">
                        <div>
                            <a href="{{route('view.post', $post->slug)}}/#comments" class="btn-sm btn-outline btn">
                                <i class="la la-comment"></i><span class="panel-text fw-bold"> {{$post->comment()->count()}}</span> 
                            </a> 
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
                @empty
                <div class="panel">

                </div>
                @endforelse
                
            </div>
            <div class="ajax-load text-center mb-2">
                <button class="btn btn-primary btn-sm" onclick="loadMore()">{{('Load More')}}</button>
            </div>
        </div>
        
    </div>
    <div class="col-lg-4">
        @include('front.side')            
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
	                $('.ajax-load').addClass('.d-none');
	                return;
	            }
	            // $('.ajax-load').hide();
	            $("#alpos").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
                $('.ajax-load').html("No more records found");
                // $('.ajax-load').hide(); 
                $('.ajax-load').addClass('.d-none');
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
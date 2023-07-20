@foreach($posts as $post)
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
                <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{url('/send/'.$post->slug)}}&t={{$post->content}}" target="_blank">
                    Facebook
                </a>
                <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{$post->content}}&url={{url('/send/'.$post->slug)}}"  target="_blank">
                    Twitter
                </a> 
                <a class="dropdown-item" href="whatsapp://send?text= {{$post->content}} - {{url('/send/'.$post->slug)}}" target="_blank">
                    Whatsapp
                </a> 
                <a class="dropdown-item" type="button" onclick="copyLink('con{{$post->id}}')">
                    <p class="d-none" id="con{{$post->id}}">{{$post-> content}} {{url('/send/'.$post->slug)}}</p>
                    @lang('Copy')
                </a> 
            </div>
        </div>
    </div>
</div>
@endforeach
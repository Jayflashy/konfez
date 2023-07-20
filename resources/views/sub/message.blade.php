@foreach ($messages as $item)
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
@endforeach
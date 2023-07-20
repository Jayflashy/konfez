@extends('front.layouts.master')
@section('title') @lang('Dashboard') @endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="sidebar stickyfill">
            @include('front.layouts.sidenav')
        </div>
    </div>
    <div class="col-lg-9">
        <h5 class="ms-2">@lang('Welcome back') {{$user->username}} !</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex">
                        <span class="bg-info text-white stamp me-3">
                            <i class="las la-file-alt icon-md"></i>
                        </span>
                        <div class="lh-sm">
                            <div class="strong">
                                @lang('Posts')
                            </div>
                            <div class="text-muted">
                               {{$user->posts->count()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex">
                        <span class="bg-danger text-white stamp me-3">
                            <i class="las la-comment icon-md"></i>
                        </span>
                        <div class="lh-sm">
                            <div class="strong">
                               @lang('Comments')
                            </div>
                            <div class="text-muted">
                                {{$user->comment->count()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6>@lang('Messages')</h6>
                <a href="{{route('user.messages')}}" class="btn btn-sm btn-primary">@lang('View all')</a>
            </div>
            <div class="card-body">
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
                    {{-- <div class="panel-body">
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
                    </div> --}}
                </div>
                @endforelse
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
        {{-- Posts --}}
        <div class="card">
            <div class="card-header">
                <h6>@lang('Confessions')</h6>
                <a href="{{route('user.posts')}}" class="btn btn-sm btn-primary">@lang('View all')</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Category')</th>
                            <th>@lang('Views')</th>
                            <th>@lang('Likes')</th>
                            <th>@lang('Comments')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $key=> $item)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td class="fw-bold">
                                <a href="{{route('view.post' , $item->slug)}}">{{ Str::limit($item->title, 40) }} </a>  
                            </td>
                            <td>{{ $item->category->name }} </td>
                            <td>{{$item->postview()}} </td>
                            <td>{{$item->likes()}}</td>
                            <td>{{$item->comment()->count()}} </td>
                            <td>
                                @if ( $item->status == 1)
                                    <span class="badge badge-pill bg-success">@lang('approved')</span>
                                @else
                                    <span class="badge badge-pill bg-warning" >@lang('pending')</span>
                                @endif
                            </td>
                            <td class="actions">                          
                                <a class="btn btn-primary btn-sm btn-circle" href="{{route('edit.post', $item->id)}}" title="@lang('Edit')">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm" href="{{route('delete.post', $item->id)}}" title="@lang('Delete')">
                                    <i class="las la-trash"></i>
                                </a>
                            </td>                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
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
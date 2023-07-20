<div class="bg-white stickyfill">
    <div class="panel">
        <div class="panel-header">
            <p class="card-title">{{ __('Search') }} </p> 
        </div>
        <div class="panel-body" aria-labelledby="searchForm">
            <form class="" action="{{route('search')}}" method="GET">                    
                <input type="text" class="form-control" id="search" name="search" value="{{old('search')}}" minlength="3" placeholder="@lang('Search')...">                                                                            
                <button type="submit" class="btn btn-primary">@lang('Search')</button>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header">
            <p class="card-title mb-0">{{ __('Categories') }} </p> 
        </div>
        <div class="panel-body">            
            @php $categories = App\Models\Category::where('status',1)->get() @endphp
            <ul class="list-group">
            @foreach($categories as $category)
                <a class="list-group-item d-flex {{ (request()->is('category/'.$category->slug)) ? 'active' : '' }}" href="{{ url('category/'.$category->slug) }}">
                    {{ $category->name }} 
                    <div class="float-end  ms-auto">
                        <span class="badge badge-pill bg-primary"> {{$category->post->count() }} </span>
                    </div>
                </a>
            @endforeach
            </ul>     
        </div>
    </div>
    <div class="panel">
        <div class="panel-header">
            <p class="card-title mb-0">{{ __('Latest Posts') }} </p> 
        </div>
        @php $posts = App\Models\Post::where('status',1)->orderBy('created_at', 'desc')->take(7)->get();  @endphp
        <div class="panel-body">
            <ul class="list-group list-group-flush">
                @foreach ($posts as $item)
                <li class="list-group-item">
                    <a class="small" href="{{route('view.post',$item->slug)}}">
                        {{ Str::limit($item->title, 120) }}
                    </a>
                </li>                    
                @endforeach
            </ul>
        </div>
    </div>
</div>
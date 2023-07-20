@extends('back.layouts.master')
@section('title') @lang('Create Page') @stop
@section('content')
<div class="row justify-content-center">
    <div class="page-title">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">@lang('Create Page') </h5>
        </div>
    </div>
    <form class="card" action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-header px-0">
			<h6 class="fw-bold mb-0">@lang('Create Page') </h6>
		</div>
		<div class="card-body px-0">
			<div class="form-group row">
				<label class="col-sm-2 form-label" for="name">@lang('Title') <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="@lang('Title')" name="title" required>
				</div>
			</div>

            <div class="form-group row">
                <label class="col-sm-2 form-label" for="name">@lang('Link') <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <div class="input-group d-md-flex d-sm-block">
                        <span class="input-group-text">{{ route('index') }}/page/</span>
                        <input type="text" class="form-control w-sm-100" placeholder="@lang('Slug')" name="slug" required>
                    </div>                    
                    <small class="form-text text-danger">@lang('Only a-z, numbers, hypen allowed') </small>
                </div>
            </div>

			<div class="form-group row">
				<label class="col-sm-2 form-label" for="name">@lang('Content') <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<textarea class="form-control" placeholder="@lang('Content')" id="tiny2" name="body" required rows="4"></textarea>
				</div>
			</div>

            <div class="text-end">
				<button type="submit" class="btn btn-primary">@lang('Create')</button>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts')
<!--Wysiwig js-->
<script src="{{ static_asset('tinymce/tinymce.min.js') }}"></script>
<script src="{{static_asset('tinymce/tiny-init.js') }}"></script>
@endsection
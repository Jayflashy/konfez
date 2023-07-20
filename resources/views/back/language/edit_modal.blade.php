<div class="modal-header">
    <h5 class="modal-title" id="addlabel"> @lang('Edit Key')</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
{{$key}}
{{-- <form action="{{route('language.edit_key', $id)}}" method="post">
    <div class="modal-body">
        @csrf
        <div class="form-group ">
            <label for="inputName" class="form-label form-title"></label>

            <input type="text" class="form-control" name="value" placeholder="@lang('Value')" value="">

        </div>
        <input type="hidden" name="key">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm"> @lang('Update')</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
    </div>
</form> --}}
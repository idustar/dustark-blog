@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>@lang('common.whoops')</strong>
        @lang('common.problems')<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
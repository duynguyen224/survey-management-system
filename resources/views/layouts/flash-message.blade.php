@if ($message = Session::get('success'))
    <x-alert message="{{ $message }}" extraClass="alert-success" />
@endif

@if ($message = Session::get('error'))
    <x-alert message="{{ $message }}" extraClass="alert-danger" />
@endif

@if ($message = Session::get('warning'))
    <x-alert message="{{ $message }}" extraClass="alert-warning" />
@endif

@if ($message = Session::get('info'))
    <x-alert message="{{ $message }}" extraClass="alert-info" />
@endif

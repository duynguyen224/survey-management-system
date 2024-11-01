@if (!empty($href))
    <a id="{{ $id }}" href="{{ $href }}" class="sms-dropdown-item dropdown-item {{ $class }}">
        @if ($icon)
            {!! $icon !!}
        @endif
        {{ $label }}
    </a>
@else
    <span id="{{ $id }}" class="sms-dropdown-item dropdown-item {{ $class }}">
        @if ($icon)
            {!! $icon !!}
        @endif
        {{ $label }}
    </span>
@endif

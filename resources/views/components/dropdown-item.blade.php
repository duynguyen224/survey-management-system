@if (!empty($href))
    <a id="{{ $id }}" href="{{ $href }}" class="cms-dropdown-item dropdown-item {{ $class }}">
        @if ($icon)
            {!! $icon !!}
        @endif
        {{ $label }}
    </a>
@else
    <span id="{{ $id }}" class="cms-dropdown-item dropdown-item {{ $class }}">
        @if ($icon)
            {!! $icon !!}
        @endif
        {{ $label }}
    </span>
@endif

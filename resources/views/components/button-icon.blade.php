<button id="{{ $id }}" type="button" class="btn btn-primary {{ $extraClass }}">
    @if ($icon)
        {!! $icon !!}
    @endif
    {{ $label }}
</button>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{ '#' . $modalId }}">
    @if ($icon)
        {!! $icon !!}
    @endif
    {{ $label }}
</button>

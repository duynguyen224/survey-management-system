<button type="button" class="btn btn-primary" id="{{ $id }}" data-bs-toggle="modal" data-bs-target="{{ '#' . $modalId }}">
    @if ($icon)
        {!! $icon !!}
    @endif
    {{ $label }}
</button>

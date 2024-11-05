<button type="button" class="btn btn-primary" id="{{ $id }}" data-bs-toggle="{{ $bsToggle ? 'modal' : '' }}" data-bs-target="{{ '#' . $modalId }}">
    @if ($icon)
        {!! $icon !!}
    @endif
    {{ $label }}
</button>

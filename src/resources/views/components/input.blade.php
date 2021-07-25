<div class="form-group">
    <label for="{{ $field }}" class="form-label mt-4">{{ $fieldLabel }}</label>
    <input type="{{ $type ?? 'text' }}"
           class="form-control"
           id="{{ $field }}"
           name="{{ $field }}"
           aria-describedby="{{ $fieldLabel }}"
           placeholder="Enter {{ $fieldLabel }}"
           @isset ($value) value="{{ $value }}" @endisset
           @if ($disabled ?? false) disabled @endif
           @if ($readonly ?? false) readonly @endif>
</div>

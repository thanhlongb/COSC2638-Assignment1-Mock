<div class="form-group">
    <label for="{{ $field }}" class="form-label mt-4">{{ $fieldLabel }}</label>
    <select class="form-select" id="{{ $field }}" name="{{ $field }}">
        @foreach ($options as $option)
            <option value="{{ $option }}" @if($option == $default) selected @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

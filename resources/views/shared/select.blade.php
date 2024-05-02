@php
    $class ??= null;
    $label ??= '';
    $name ??= '';
@endphp

<label for="{{ $name }}">{{ $label }}</label>
<select class="form-select @error ($name) @enderror" name="{{ $name }}[]" id="{{ $name }}" multiple>
    @foreach ($options as $k => $v)
        <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
    @endforeach
</select>

@error($name)
    <div class="invalid-Feedback">
        <span style="color: red;">{{ $message }}</span> 
    </div>
@enderror

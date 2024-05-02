@php

$class ??= null;
$type ??= 'text';
$name ??= '';
$value ??= '';
$label ??= Str::ucfirst($name);

@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="mb-2">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea type="{{ $type }}" class="form-control @error($name) 'is-invalid' @enderror" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <div class="invalid-Feedback">
            <span style="color: red;">{{ $message }}</span>
        </div>
    @enderror
</div>

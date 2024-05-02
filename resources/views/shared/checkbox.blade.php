@php
    $class ??= null;
    $name ??= '';
@endphp

<div @class(['form-check form-switch', $class])>
    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" value="1" name="{{ $name }}" class="form-check-input" role="switch" id="{{ $name }}" style="cursor: pointer;">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>

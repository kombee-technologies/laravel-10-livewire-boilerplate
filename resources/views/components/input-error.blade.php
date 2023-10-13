@props(['for'])

@error($for)
<div {{ $attributes->merge(['class' => 'fv-plugins-message-container invalid-feedback']) }}>
    <div data-field="{{ $for }}" data-validator="notEmpty">
        {{ $message }}
    </div>
</div>
@enderror

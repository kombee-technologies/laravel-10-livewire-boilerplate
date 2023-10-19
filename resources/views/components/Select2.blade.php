@php
    $class = 'form-control custom-select2';
@endphp

@error($variable)
  @php
      $class .= 'border-danger';
  @endphp
@enderror

<select {!! $attributes->merge(['class' => $class]) !!} wire:model="{{ str_replace('$','', $variable) }}" class=" " data-livewire="@this">
    {{ $slot }}
</select>

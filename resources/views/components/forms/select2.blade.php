@php
    $class = 'form-control custom-select2';
@endphp

@error($variable)
  @php
      $class .= 'border-danger';
  @endphp
@enderror

<select {{  $attributes->merge(['class' => $class]) }} wire:model="{{  str_replace('$','', $variable)  }}" data-livewire="@this">
    {{ $slot }}
</select>

@push('scripts')
<script>
$(document).ready(function () {
    $(document).find('.custome-select2').each(function () {

        var option = {
            with: '100%',
        };

        if($(this).attr('data-hide-search') === "true"){
            option.minimumResultsForSearch = -1;
            option.closeOnSelect = false;

        }

        if($(this).attr('data-placeholder')){
            option.placeholder = $(this).attr('data-placeholder');
        }

        $(this).select2(option).on('change', function(e) {
            let livewire = $(this).data('livewire');
            let variable = $(this).attr('wire:model');
            eval(livewire).set(variable, $(this).val());
        });
    });
});
</script>
@endpush

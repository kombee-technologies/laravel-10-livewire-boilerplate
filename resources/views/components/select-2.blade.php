
@props(['placeholder' => 'Select Opations', 'id'])

<select id="{{ $id }}" class="form-select"  data-control="select2" data-placeholder="{{ $placeholder }}">
    {{ $slot }}
</select>

@once


@push('scripts')

<script data-navigate-once>
   $(document).ready(function () {
        $('#{{ $id }}').select2();
        $('#{{ $id }}').on('change', function (e) {
            var data = $(this).val();
            @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', data);
        });
    });
</script>
@endpush

@endonce

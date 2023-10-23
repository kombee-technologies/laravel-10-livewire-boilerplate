
@props(['placeholder' => 'Select Opations', 'id'])

<select id="{{ $id }}" class="form-select" data-control="select2" data-placeholder="{{ $placeholder }}">
    {{ $slot }}
</select>

@push('scripts')
<script>
   $(document).ready(function () {
        $('#{{ $id }}').select2();
        $('#{{ $id }}').on('change', function (e) {
            var data = $(this).val();
            @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', data);
        });
    });
</script>
@endpush


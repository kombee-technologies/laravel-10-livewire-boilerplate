
@props(['placeholder' => 'Select Opations', 'id'])

<div wire:ignore>
    <select id="{{ $id }}" class="form-select" data-placeholder="{{ $placeholder }}">
        {{ $slot }}
    </select>
</div>


@push('scripts')
<script type="text/javascript">
   $(document).ready(function () {
        $('#{{ $id }}').select2();
        $('#{{ $id }}').on('change', function (e) {
            var data = $(this).val();
            @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', data);
        });
    });
</script>
@endpush


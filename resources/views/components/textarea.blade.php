@props(['disabled' => false, 'id'])

<div wire:ignore>
    <textarea id="{{ $id }}"  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!} style="height: 100px"></textarea>
</div>

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#{{ $id }}'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
            @this.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush

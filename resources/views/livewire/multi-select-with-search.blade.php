<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search..." class="w-full px-3 py-2 border rounded-md">
    <div class="mt-2">
        @foreach($filteredOptions as $option)
        <label class="inline-flex items-center">
            <input type="checkbox" value="{{ $option }}" wire:model="selected" class="text-indigo-600 border-gray-300 rounded focus:ring-0">
            <span class="ml-2 text-gray-700">{{ $option }}</span>
        </label>
        @endforeach
    </div>
</div>
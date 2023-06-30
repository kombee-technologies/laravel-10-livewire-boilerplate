<div>
    <div class="flex justify-items-center">

        <!-- <a class="cursor-pointer mr-4" href="#">
            <x-icon name="eye" class="text-indigo hover:font-bold mr-3 flex-shrink-0 h-6 w-6">
            </x-icon>
        </a> -->

        <a class="cursor-pointer mr-4" href="{{route('admin.users.update', ['id' => $row->id])}}" >
            <x-icon name="pencil-square" class="text-indigo hover:font-bold mr-3 flex-shrink-0 h-6 w-6">
            </x-icon>
        </a>


        <!-- <div class="cursor-pointer" wire:click="delete({{ $row->id }})">

            <x-icon name="trash" class="text-indigo hover:text-red-500 mr-3 flex-shrink-0 h-6 w-6">
            </x-icon>
        </div> -->

        <div class="cursor-pointer" onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click="delete({{ $row->id }})">

            <x-icon name="trash" class="text-indigo hover:text-red-500 mr-3 flex-shrink-0 h-6 w-6">
            </x-icon>
        </div>
    </div>
</div>
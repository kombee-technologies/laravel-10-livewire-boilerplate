<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users List
        </h2> -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-3">
                    Users List
                </h2>

                <div class="">
                    <a href="{{route('create-user')}}" class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create New User
                    </a>
                </div>

            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif





                <!-- <a href="#" class="cursor-pointer" wire:click="$emitTo('confirm', 'displayConfirmation', 'Delete Record', 'Are you sure?', 'create-users', 'destroyRecord', '22')">

                    <x-icon name="trash" class="text-indigo hover:text-red-500 mr-3 flex-shrink-0 h-6 w-6">
                    </x-icon>
                </a> -->

                {{-- <livewire:users-table /> --}}

                <livewire:data-table-users/>

                {{-- <livewire:user-data-table/> --}}

            </div>
        </div>
    </div>
</x-app-layout>

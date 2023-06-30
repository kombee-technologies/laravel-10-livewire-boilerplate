<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ ($action == 'create') ? __('Add User') : __('Update User') }}
        {{-- __('Add User') --}}
    </h2>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-2 md:gap-12">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="overflow-hidden shadow sm:rounded-md">

                        <div class="bg-white px-4 py-5 sm:p-6">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="first-name" value="{{ __('First name*') }}" />
                                    <x-input wire:model="user.first_name" id="first-name" class="block mt-1 w-full" type="text" />
                                    <x-input-error for="user.first_name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="last-name" value="{{ __('Last name*') }}" />
                                    <x-input wire:model="user.last_name" id="last_name" class="block mt-1 w-full" type="text" />
                                    <x-input-error for="user.last_name" class="mt-2" />
                                </div>


                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="email-address" value="{{ __('Email*') }}" />
                                    <x-input wire:model="user.email" id="email-address" class="block mt-1 w-full" type="text" />
                                    <x-input-error for="user.email" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="mobile_no" value="{{ __('Mobile No*') }}" />
                                    <x-input wire:model="user.mobile_no" id="mobile_no" class="block mt-1 w-full" type="text" />
                                    <x-input-error for="user.mobile_no" class="mt-2" />
                                </div>

                                <div class="col-span-6">
                                    <x-label for="address" value="{{ __('Address*') }}" />
                                    <textarea wire:model="user.address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" name="description" rows="5"></textarea>
                                    <x-input-error for="user.address" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <x-label for="country_id" value="{{ __('Country*') }}" />
                                    <select id="country_id" wire:model="user.country_id" wire:change="getCountryStates" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">-- Select Country --</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="user.country_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <x-label for="state_id" value="{{ __('State*') }}" />
                                    <select id="state_id" wire:model="user.state_id" wire:change="getStateCities" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">-- Select State --</option>
                                        @if(!empty($states))
                                        @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <x-input-error for="user.state_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <x-label for="city_id" value="{{ __('City*') }}" />
                                    <select id="city_id" wire:model="user.city_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">-- Select City --</option>
                                        @if(!empty($cities))
                                        @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <x-input-error for="user.city_id" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <x-label for="dob" value="{{ __('Birthday*') }}" />
                                    <input type="date" id="datepicker" max="<?php echo date("Y-m-d"); ?>" wire:model="user.dob" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <x-input-error for="user.dob" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <x-label for="gender" value="{{ __('Gender*') }}" />
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio" wire:model="user.gender" value="0">
                                            <span class="ml-2">Female</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio" wire:model="user.gender" value="1">
                                            <span class="ml-2">Male</span>
                                        </label>
                                    </div>
                                    <x-input-error for="user.gender" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <x-label for="hobbies" value="{{ __('Hobbies*') }}" />
                                    <div class="mt-2">
                                        @foreach ($getHobbies as $key => $hobby)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox" value="{{ $hobby->id }}" id="exampleFormControlInput3" wire:model="hobbies">
                                            <span class="ml-2">{{ $hobby->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                    <x-input-error for="hobbies" class="mt-2" />
                                    <x-input-error for="hobbies.*" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="mt-2">
                                        @if(isset($user['user_galleries']))
                                        @foreach ($user['user_galleries'] as $key => $gallery)
                                        <div><img src="{{$gallery->filename}}" /></div>
                                        @endforeach
                                        @endif
                                        <x-label for="galleries" value="{{ __('Image Upload*') }}" />
                                        <input type="file" max="5" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" wire:model="galleries" multiple>
                                    </div>
                                    <x-input-error for="galleries" class="mt-2" />
                                    <x-input-error for="galleries.*" class="mt-2" />
                                </div>


                                <div class="flex flex-col col-span-6">
                                    <div class="flex flex-wrap gap-2">

                                        @foreach($chips as $index => $chip)
                                        <div class="bg-gray-100 text-gray-700 rounded-full py-1 px-2">
                                            {{ $chip }}
                                            <button class="ml-2 text-xs font-medium text-gray-500 hover:text-gray-700" wire:click="removeChip({{ $index }})">
                                                x
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-2">
                                        <x-label for="galleries" value="{{ __('Chip') }}" />
                                        <input type="text" class="border-gray-300 rounded-md w-full py-2 px-3" placeholder="Add a chip..." wire:keydown.enter="addChip($event.target.value)">
                                    </div>
                                </div>

                                {{-- <livewire:multi-select-with-search :options="['Option 1', 'Option 2', 'Option 3']" :selected="['Option 1']" /> --}}

                                <div>
                                    <input type="text" wire:model.debounce.300ms="search" placeholder="Search..." class="w-full px-3 py-2 border rounded-md">
                                    <div class="mt-2">
                                        @foreach($filteredOptions as $option)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" value="{{ $option }}" wire:model="tags" class="text-indigo-600 border-gray-300 rounded focus:ring-0">
                                            <span class="ml-2 text-gray-700">{{ $option }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex flex-col col-span-6">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                                    <thead class="border-b font-medium dark:border-neutral-500">
                                                        <tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($action == 'create')
                                                        <tr>
                                                            <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                                <x-label for="comment" value="{{ __('Comment*') }}" />
                                                                <x-input wire:model="comment.0" class="block mt-1 w-full" type="text" />
                                                                <x-input-error for="comment.0" class="mt-2" />
                                                            </td>
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <x-heroicons::mini.solid.plus-circle class="w-10 h-10 cursor-pointer" wire:click.prevent="add({{$i}})" />
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        @foreach($inputs as $key => $value)

                                                        <tr class="border-b dark:border-neutral-500">
                                                            <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                                <x-label for="galleries" value="{{ __('Comment*') }}" />
                                                                <input type="text" wire:model="comment.{{ $value }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                                @error('comment.'.$value) <span class="text-red-500">{{ $message }}</span>@enderror
                                                            </td>

                                                            @if($value == 1 && $action != 'create')
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <!-- <x-heroicons::mini.solid.minus-circle class="w-10 h-10 hover:text-red-500 cursor-pointer" wire:click.prevent="remove({{$key}})" /> -->
                                                                <x-heroicons::mini.solid.plus-circle class="w-10 h-10 cursor-pointer" wire:click.prevent="add({{$i+1}})" />
                                                            </td>
                                                            @else
                                                            <td class="whitespace-nowrap px-6 py-4">
                                                                <x-heroicons::mini.solid.minus-circle class="w-10 h-10 hover:text-red-500 cursor-pointer" wire:click.prevent="remove({{$key}})" />
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">

                            <x-action-message class="mr-3" on="saved">
                                {{ __('Saved.') }}
                            </x-action-message>

                            <x-secondary-button wire:click="cancel()" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            @if($action == 'create')
                            <x-button class="ml-3" wire:click="store()" wire:loading.attr="disabled">
                                {{ __('Save') }}
                            </x-button>
                            @else
                            <x-button class="ml-3" wire:click="edit()" wire:loading.attr="disabled">
                                {{ __('Update') }}
                            </x-button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
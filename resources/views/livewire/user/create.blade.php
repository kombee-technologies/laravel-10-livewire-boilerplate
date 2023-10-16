<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Create User</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/dashboard" class="text-muted text-hover-primary" wire:navigate>@lang('messages.user.breadcrumb.home')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/users" class="text-muted text-hover-primary" wire:navigate>@lang('messages.user.breadcrumb.user')</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Create</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">

                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <form class="row g-6">

                        <div class="col-md-6">
                            <x-label for="first-name" class="required" value="{{ __('First name') }}" />
                            <x-input type="text" wire:model="user.first_name" autofocus />
                            <x-input-error for="user.first_name" />
                        </div>

                        <div class="col-md-6">
                            <x-label for="last-name" class="required" value="{{ __('Last name') }}" />
                            <x-input type="text" wire:model="user.last_name" />
                            <x-input-error for="user.last_name" />
                        </div>

                        <div class="col-md-6">
                            <x-label for="email-address" class="required" value="{{ __('Email') }}" />
                            <x-input type="email" wire:model="user.email" />
                            <x-input-error for="user.email" />
                        </div>

                        <div class="col-md-6">
                            <x-label for="mobile_no" class="required" value="{{ __('Mobile No') }}" />
                            <x-input type="text" wire:model="user.mobile_no" />
                            <x-input-error for="user.mobile_no" />
                        </div>

                        <div class="col-md-12">
                            <x-label for="mobile_no" class="required" value="{{ __('Mobile No') }}" />
                            <x-input type="text" wire:model="user.mobile_no" />
                            <x-input-error for="user.mobile_no" />
                        </div>

                        <div class="col-md-12">
                            <x-label for="address" class="required" value="{{ __('Address') }}" />
                            <x-textarea wire:model="user.address" />
                            <x-input-error for="user.address" />
                        </div>

                        <div class="col-md-4">
                            <x-label for="country_id" class="required" value="{{ __('Country') }}" />
                            <select class="form-select" wire:model="user.country_id" wire:change="getCountryStates"
                                data-control="select2" data-placeholder="Select an option">
                                <option value="">-- Select Country --</option>
                                @if (isset($countries) && !empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="user.country_id" />
                        </div>

                        <div class="col-md-4">
                            <x-label for="state_id" class="required" value="{{ __('State') }}" />
                            <select class="form-select" wire:model="user.state_id" wire:change="getStateCities"
                                data-control="select2" data-placeholder="Select an option">
                                <option value="">-- Select State --</option>
                                @if (isset($states) && !empty($states))
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="user.state_id" />
                        </div>

                        <div class="col-md-4">
                            <x-label for="city_id" class="required" value="{{ __('City') }}" />
                            <select class="form-select" wire:model="user.city_id" data-control="select2"
                                data-placeholder="Select an option">
                                <option value="">-- Select City --</option>
                                @if (isset($cities) && !empty($cities))
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error for="user.city_id" />
                        </div>


                        <div class="col-12 text-end">

                            <x-secondary-button wire:click="cancel()" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-button-primary>
                                {{ __('Create') }}
                                <x-button-progress-bar wire:loading/>
                            </x-button-primary>

                        </div>
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

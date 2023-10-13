<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-center flex-lg-row-auto w-xl-600px positon-xl-relative"
            style="background-color: #808080">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid flex-column text-center flex-center">
                    <!--begin::Logo-->
                    <a href="../../demo1/dist/index.html" class="py-9 mb-5">
                        <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-60px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #ffffff;">@lang('messages.login.heading_title')</h1>
                    <!--end::Title-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    @if ($showLoginInfo)
                        <form class="form w-100" wire:submit="login">
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">@lang('messages.login.title')</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <x-label for="email" value="{{ __('messages.login.label_email') }}" />
                                <x-input type="text" name="email" :value="old('email')" wire:model="email" autofocus
                                    autocomplete="email" />
                                <x-input-error for="email" />
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <x-label for="password" value="{{ __('messages.login.label_password') }}" />
                                </div>
                                <x-input type="password" name="password" wire:model="password" :value="old('password')"
                                    autocomplete="password" />
                                <x-input-error for="password" />
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <x-button-primary class="btn-lg w-100 mb-5">
                                    {{ __('messages.next_button_text') }}
                                    <i class="las la-long-arrow-alt-right" wire:loading.remove></i>
                                    <x-button-progress-bar wire:loading/>
                                </x-button-primary>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                    @elseif ($showOTPVerify)
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">@lang('messages.login.verify_otp_title')</h1>
                            <!--end::Title-->
                            <div class="text-gray-400 fw-bold fs-4">
                                <button type="button" wire:click="back">
                                    <i class="las la-long-arrow-alt-left"></i>
                                </button>&nbsp;&nbsp;{{ $email }}
                            </div>
                        </div>
                        <!--begin::Heading-->
                        <form class="form w-100" wire:submit="verifyOtp">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <x-label for="verify_otp_code" value="{{ __('messages.login.label_verify_otp') }}" />
                                <x-input type="text" name="verify_otp_code" :value="old('verify_otp_code')"
                                    wire:model="verify_otp_code" autofocus autocomplete="verify_otp_code" />
                                <x-input-error for="verify_otp_code" />
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <x-button-primary class="btn-lg w-100 mb-5">
                                    {{ __('messages.verify_otp_button_text') }}
                                    <i class="las la-long-arrow-alt-right" wire:loading.remove></i>
                                    <x-button-progress-bar wire:loading/>
                                </x-button-primary>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                    @endif
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <!--begin::sidebar-->
    @include('components.layouts.partials.sidebar')
    <!--end::sidebar-->

    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        @include('components.layouts.partials.header')
        <!--end::Header-->

        <!--begin::Content-->
        {{ $slot }}
        <!--end::Content-->

        <!--begin::Footer-->
        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-bold me-1">
                        © {{ \Carbon\Carbon::now()->format('Y') }} </span>
                    <a href="https://www.easternts.com/" target="_blank"
                        class="text-gray-800 text-hover-primary">Eastern Techno Solutions. All Rights Reserved.</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                    <li class="menu-item">
                        <a href="https://www.easternts.com/about-us" target="_blank" class="menu-link px-2">About</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Footer-->
    </div>

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!-- Scripts -->

    @livewireScripts
    @include('components.layouts.partials.footer')
    @include('components.layouts.common-script')

    {{-- <script data-navigate-once>
        document.addEventListener('livewire:navigated', () => {
            $('.jenish').select2();
        })
    </script> --}}

    <script type="text/javascript">

        document.addEventListener('livewire:navigated', () => {
            select2Init();
        });

        function select2Init() {

            $(document).find('.custom-select2').each(function () {

                var option = {
                    with: '100%',
                };

                if($(this).attr('data-hide-search') === "true"){
                    option.minimumResultsForSearch = -1;
                    option.closeOnSelect = false;

                }

                if($(this).attr('data-placeholder')){
                    option.placeholder = $(this).attr('data-placeholder');
                }

                $(this).select2(option).on('change', function (e) {

                    let livewire = $(this).data('livewire');
                    let variable = $(this).attr('wire:model');
                    eval(livewire).set(variable, $(this).val());
                });
            });
        }

        Livewire.hook('request', ({ uri, options, payload, respond, succeed, fail }) => {
            // Runs after commit payloads are compiled, but before a network request is sent...

            respond(({ status, response }) => {
                // Runs when the response is received...
                // "response" is the raw HTTP response object
                // before await response.text() is run...
            })

            succeed(({ status, json }) => {
                setTimeout(function () {
                    select2Init();
                }, 5);
                $('.jenish').select2();
            })

            fail(({ status, content, preventDefault }) => {
                // Runs when the response has an error status code...
                // "preventDefault" allows you to disable Livewire's
                // default error handling...
                // "content" is the raw response content...
            })
        })
    </script>

</body>
</html>

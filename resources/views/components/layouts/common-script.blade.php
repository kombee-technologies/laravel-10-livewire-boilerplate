<script>
    /* alert messages */
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });

    window.addEventListener('render-select2', event => {
        //$('.js-example-templating').select2();
    });

    /* date picker */
    $("#kt_datepicker_1").flatpickr({
        dateFormat: "Y-m-d",
        maxDate: new Date()
    });

</script>



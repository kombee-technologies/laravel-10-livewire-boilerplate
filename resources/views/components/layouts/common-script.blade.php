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
         //this.select2Init();
    });

    /* date picker */
    $("#kt_datepicker_1").flatpickr({
        dateFormat: "Y-m-d",
        maxDate: new Date()
    });

    $(document).ready(function () {
       //this.select2Init();
    });

    select2Init: function() {
        $(documemt).find('.custome-select2').each(function () {

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

            $(this).select2(option).on('change', function(e) {
                let livewire = $(this).data('livewire');
                let variable = $(this).attr('wire:model');
                eval(livewire).set(variable, $(this).val());
            });
        });
    }

</script>



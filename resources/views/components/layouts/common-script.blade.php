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

    /* date picker */
    $("#kt_datepicker_1").flatpickr({
        dateFormat: "Y-m-d",
        maxDate: new Date()
    });

     $(document).ready(function(){
        select2Init();
    });

    function select2Init() {
        $(this).find('.custome-select2').each(function () {

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
                //alert('123');
                let livewire = $(this).data('livewire');
                let variable = $(this).attr('wire:model');
                eval(livewire).set(variable, $(this).val());
            });
        });
    }
</script>

<script>
    /* showAlert */
    window.addEventListener('showAlert', event => {
        Swal.fire({
                text: event.detail.message,
                icon: event.detail.type,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete it!",
                showCancelButton: true,
                customClass: {
                    confirmButton: event.detail.buttonColor,
                    cancelButton: 'btn btn-danger'
                }
            })
            .then((result) => {
                if (result.value) {
                    Livewire.dispatchTo('user.index', 'delete-confirmed', { id: event.detail.id});
                }
            });
    })
</script>

<script>
    /* showAlert */
    window.addEventListener('showDeleteConfirmation', event => {
        Swal.fire({
            text: 'Are you sure?',
            /* text: event.detail.message,
            icon: event.detail.type, */
            //buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'

        }).then((result) => {
            if (result.isConfirmed) {
                //Livewire.dispatchTo('user.index', 'confirmed', { ids: 2 })
            }
        });
    })
</script>



{{-- <script>
    /* showAlert */
    window.addEventListener('showDeleted', event => {
        Livewire.dispatch('alert', {
            type: 'success',
            message: __('messages.user.messages.delete')
        })
    })
</script> --}}

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
</script>

<script>
    /* showAlert */
    window.addEventListener('showAlert', event => {
        Swal.fire({
                text: event.detail.message,
                icon: event.detail.type,
                buttonsStyling: false,
                confirmButtonText: "Ok, I got it",
                //showCancelButton: true,
                customClass: {
                    confirmButton: event.detail.buttonColor,
                    //cancelButton: 'btn btn-danger'
                }
            })
            .then((result) => {
                if (result.value) {
                    //Livewire.dispatch('delete-confirmed');
                }
            });
    })
</script>

<script>
    /* showAlert */
    window.addEventListener('showDeleteConfirmation', event => {
        Swal.fire({
            text: 'Are you sure you want to delete this record?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'

        }).then((result) => {
            if (result.value) {
                Livewire.dispatch('delete-confirmed');
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

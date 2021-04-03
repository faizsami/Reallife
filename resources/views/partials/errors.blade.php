@if(Session::has('success'))
    <script>
        // On load Toast
        setTimeout(function () {
        toastr['success'](
        '{{ Session::get("success")}}',
        'Successfully.!',
        {
            closeButton: true,
            tapToDismiss: true
        }
        );
    },  100);
    </script>
    {{ Session::forget('success')}}
@endif
@if(Session::has('error'))
    <script>
        // On load Toast
        setTimeout(function () {
        toastr['error'](
        '{{ Session::get("error")}}',
        'Error.!',
        {
            closeButton: true,
            tapToDismiss: true
        }
        );
    }, 100);
    </script>
    {{ Session::forget('error')}}
@endif
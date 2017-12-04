@if (session()->has('flash_message'))
    <script>
        swal({
          title: "{{ session('flash_message.title') }}",
          text: "{{ session('flash_message.message') }}",
          icon: "{{ session('flash_message.level') }}",
          timer: 2100,
          button: false,
        });
    </script>
@endif

@if (session()->has('flash_message-overlay'))
    <script>
        swal({
            title: "{{ session('flash_message-overlay.title') }}",
            text: "{{ session('flash_message-overlay.message') }}",
            icon: "{{ session('flash_message-overlay.level') }}",
            button: "Okay"
        });
    </script>
@endif

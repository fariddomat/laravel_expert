@if (session('success'))
    <script>
        $(document).ready(function () {
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 2000,
            killer: true
        }).show();
    });
    </script>
@endif
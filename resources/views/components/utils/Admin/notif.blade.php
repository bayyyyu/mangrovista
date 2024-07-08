<script>
    $(document).ready(function() {
        @foreach (['success', 'warning', 'danger'] as $status)
            @if (session($status))
                Swal.fire({
                    position: "top-end",
                    icon: "{{ $status === 'success' ? 'success' : ($status === 'warning' ? 'warning' : 'error') }}",
                    title: "{{ session($status) }}",
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        @endforeach
    });
</script>

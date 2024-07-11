<script>
    // $(document).ready(function() {
    //     @foreach (['success', 'warning', 'danger'] as $status)
    //         @if (session($status))
    //             Swal.fire({
    //                 position: "top-end",
    //                 icon: "{{ $status === 'success' ? 'success' : ($status === 'warning' ? 'warning' : 'error') }}",
    //                 title: "{{ session($status) }}",
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             });
    //         @endif
    //     @endforeach
    // });
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        @foreach (['success', 'warning', 'danger'] as $status)
            @if (session()->has($status))
                Toast.fire({
                    icon: '{{ $status === 'success' ? 'success' : ($status === 'warning' ? 'warning' : 'error') }}',
                    title: '{{ session($status) }}'
                });
            @endif
        @endforeach
    });
</script>

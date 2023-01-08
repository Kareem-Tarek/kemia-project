@if (session('success'))
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@elseif(session('error'))
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif
@if ($errors->any())
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',

                @foreach ($errors->all() as $error)
                    text : '{!! $error !!}',
                @endforeach
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif

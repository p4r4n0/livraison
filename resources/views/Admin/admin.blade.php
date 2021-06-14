
    @if(isset($x))
        <script>window.location = "{{ route('restaurants') }}";</script>
    @else
            {{ view('Admin.login') }}
    @endif

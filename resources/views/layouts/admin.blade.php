@include('layouts.admin-partial.head')

@auth('admin')
    @include('layouts.admin-partial.sidebar')
@endauth


@yield( 'admin-content')

@auth('admin')
    @include('layouts.admin-partial.footer')
@endauth

@include('layouts.admin-partial.scripts')


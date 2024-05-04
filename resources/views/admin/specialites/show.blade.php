@extends('Dashboard')
@section('content')
    <section>
        <div class="page-header">
            <h3 class="page-title">{{ $title }}</h3>
        </div>
        @yield('option')
    </section>
@endsection

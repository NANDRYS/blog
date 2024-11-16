@extends('layouts.O4KO')


@section('content')
    <header>
        @include('includes.header')
    </header>

    <main>
        <div class="container d-flex flex-row gap-5 my-5">
            @yield('contents')
        </div>
    </main>


    <footer>
        @include('includes.footer')
    </footer>

    <script src="{{ asset('js/user/main.js') }}"></script>
@endsection

@extends('layouts.app')
@section('content')
    <section id="content">
        @include('layouts.nav')
        <div class="thanks">
            <h1 style="font-size: 128px;">THANKS</h1>
            <h1 style="font-size: 128px;">THANKS</h1>
            <h1 style="font-size: 128px;">THANKS</h1>
            <h1 style="font-size: 128px;">THANKS</h1>
        </div>
        <div class="container-thanks">
            <div class="text">
                <p>For sharing your best poses using <span>PhotoBlast</span></p>
                <p>Ignite your passion by sharing your precious <span>memories</span> here</p>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/thanks.js') }}"></script>
@endsection

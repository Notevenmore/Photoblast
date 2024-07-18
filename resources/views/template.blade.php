@extends('layouts.app')
@section('content')
<section id="content">
  @include('layouts.nav')
  <div class="chooseTitle">
    <h1>CHOOSE</h1>
    <h1>CHOOSE</h1>
    <h1>CHOOSE</h1>
    <h1>CHOOSE</h1>
  </div>
  <div class="tagline">
    <span style="color: #cfd4da">YOUR </span>
    <span style="font-weight: bolder; color: white;">STYLE</span>
  </div>
  <div class="templates">
    <div class="template">
      @foreach ($temps as $temp)
        <a href="{{ route('tempcollage.show', ['tempcollage' => $temp]) }}"><img src="{{ asset($temp->src) }}" alt=""></a>
      @endforeach
    </div>
  </div>
</section>
<script src="{{ asset('js/gallery.js') }}"></script>
@endsection
@extends('layouts.app')
@section('content')
  <script>
    const templatefotosrc = "{{ asset($template_src)}}";
    var x = {{ $template_x }};
    var y = {{ $template_y }};
    const width = {{ $template_width }};
    const height = {{ $template_height }};
    const margin = {{ $template_margin }};
    const photos = {!! json_encode($photos) !!}
    const email = "{{ $email }}";
  </script>
  <script src="{{ asset('js/print.js') }}"></script>
@endsection
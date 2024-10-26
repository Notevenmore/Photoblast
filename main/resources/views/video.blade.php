@extends('layouts.app')
@section('content')
<section id="linkedvideo">
  <video controls>
    <source src="{{ asset('storage/'.$email.'/video/recorded_video.webm') }}" type="video/webm">
      Your browser does not support the webm format.
  </video>
  <a href="{{ asset('storage/'.$email.'/video/recorded_video.webm') }}" download>DOWNLOAD VIDEO DISINI</a>
</section>
@endsection
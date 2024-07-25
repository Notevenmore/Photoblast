@extends('layouts.app')
@section('content')
<section class="content">
  @include('layouts.nav')
  <div class="chooseTitle">
    <h1>SELECT</h1>
    <h1>SELECT</h1>
    <h1>SELECT</h1>
    <h1>SELECT</h1>
  </div>
  <div class="tagline">
    <span style="color: #cfd4da">YOUR </span>
    <span style="font-weight: bolder; color: white;">@if(Request::routeIs('print-photo')) 3 @endif PHOTO @if(Request::routeIs('list-photo')) FOR RETAKE @endif</span>
  </div>
  <section id="list-photo">
    <form action="@if(Request::routeIs('list-photo')) {{ route('retake-photo') }} @elseif(Request::routeIs('print-photo')) {{ route('print') }} @endif" method="post">
      @csrf
      @foreach(collect($photos)->chunk(5) as $photoschunk)
        <div class="photo-group">
          @foreach($photoschunk as $photo)
            <div class="photo-item">
              <input type="checkbox" name="photos[]" class="checkbox-limit" id="{{ $photo }}" value="{{ $photo }}">
              <label for="{{ $photo }}"><img src="{{ asset(str_replace('public', 'storage', $photo)) }}" alt=""></label>
            </div>
          @endforeach
        </div>
      @endforeach
      <div class="formgroup">
        @if(Request::routeIs('list-photo'))
          <button type="submit" class="formbutton">
            RETAKE
          </button>
          <a href="{{ route('print-photo') }}" class="formbutton">
            NEXT
          </a>
        @elseif(Request::routeIs('print-photo'))
          <a href="{{ route('list-photo') }}" class="formbutton">
            BACK
          </a>
          <button type="submit" class="formbutton">
            PRINT
          </button>
        @endif
      </div>
    </form>
  </section>
</section>
@endsection
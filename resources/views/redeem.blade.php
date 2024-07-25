@extends('layouts.app')
@section('content')
<section class="content" style="display: flex; flex-direction: column;">
  @include('layouts.nav')
  <div class="welcome">
    <h1>WELCOME</h1>
    <h1>WELCOME</h1>
    <h1>WELCOME</h1>
    <h1>WELCOME</h1>
  </div>
  <form action="{{ route('redeem.store') }}" method="post">
    @csrf
    <div class="container" id="redeemText">
      <div class="text" onclick="showInput()">
        <span class="text-1">REDEEM</span>
        <span class="text-2">HERE</span>
      </div>
      <div class="input">
        <input type="text" name="code" id="form-input">
      </div>
    </div>
    <div class="simple-keyboard"></div>
    <button type="submit" hidden>Enter</button>
  </section>
</form>
<script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.js"></script>
<script src="{{ asset('js/keyboard.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
@endsection
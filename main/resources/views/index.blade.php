@extends('layouts.app')
@section('content')
@include('layouts.nav')
  <section id="content">
    <h1 class="title">Let's Get Started !!!</h1>
    <div class="packages">
      <div class="detail-package">
        <div class="package-confirmed">
          <div class="side-content">
            <div class="heading-content">
              <div class="logo"></div>
              <div class="titleandprice">
                <h1>DUKE</h1>
                <h1>100K</h1>
              </div>
            </div>
            <div class="description-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sunt quae aspernatur voluptates soluta quo deserunt deleniti quas neque consequatur?</p>
            </div>
          </div>
        </div>
        <form action="{{ route('payment') }}" method="post">
          @csrf
          <input type="hidden" name="amount" value="100000">
          <button type=submit class="confirmed">Confirm Payment</button>
        </form>
      </div>
      <div class="detail-package">
        <div class="package-confirmed">
          <div class="side-content">
            <div class="heading-content">
              <div class="logo"></div>
              <div class="titleandprice">
                <h1>Nuke</h1>
                <h1>100K</h1>
              </div>
            </div>
            <div class="description-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sunt quae aspernatur voluptates soluta quo deserunt deleniti quas neque consequatur?</p>
            </div>
          </div>
        </div>
        <form action="{{ route('payment') }}" method="post">
          @csrf
          <input type="hidden" name="amount" value="100000">
          <button type=submit class="confirmed">Confirm Payment</button>
        </form>
      </div>
      <div class="detail-package">
        <div class="package-confirmed">
          <div class="side-content">
            <div class="heading-content">
              <div class="logo"></div>
              <div class="titleandprice">
                <h1>Reedem</h1>
                <h1>100K</h1>
              </div>
            </div>
            <div class="description-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sunt quae aspernatur voluptates soluta quo deserunt deleniti quas neque consequatur?</p>
            </div>
          </div>
        </div>
        <a href="{{ route('redeem.index') }}">Reedem</a>
      </div>
    </div>
  </section>
  <script src="{{ asset('js/script.js') }}"></script>
@endsection
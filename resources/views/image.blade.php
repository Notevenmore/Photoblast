@extends('layouts.app')
@section('content')
@include('layouts.nav')
<img src="{{ $qrcode }}" alt="">
<form action="{{ route('verify') }}" method="post">
  @csrf
  <input type="hidden" name="order_id" value="{{ $order_id }}">
  <button type="submit">Verifikasi Pembayaran</button>
</form>
@endsection
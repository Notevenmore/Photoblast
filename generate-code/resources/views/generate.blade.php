@extends('layouts/app')
@section('content')
  <section id="Generate-code">
    <div class="dashboard">
      <h1 class="title">Daftar Token</h1>
      <div class="rincian-dana">
        <div class="title">
          <h1>Pembelian</h1>
        </div>
        <div class="rincian">
          <h2>Total</h2>
          <p>{{ $transaction->sum('amount') }}</p>
        </div>
        <div class="rincian">
          <h2>Bulan Ini</h2>
          <p>{{ $transaction->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->sum('amount') }}</p>
        </div>
      </div>
      <div class="grafik-1"></div>
      <div class="grafik-2"></div>
      <div class="list-code">
        <div class="title-list">
          <h1>Terakhir dibuat</h1>
          <hr>
        </div>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Token</th>
              <th>Email</th>
              <th>Status</th>
              <th>Tanggal Pembuatan</th>
              <th>Nominal transaksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($codes as $key => $code)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $code->code }}</td>
                <td>{{ $code->transaction->email }}</td>
                <td>{{ $code->status }}</td>
                <td>{{ $code->created_at }}</td>
                <td>{{ $code->transaction->amount }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="token-form">
      <div class="title">
        <h1>Buat Token</h1>
      </div>
      <div class="form-token">
        <form action="{{ route('makeCode') }}" method="post">
          @csrf
          <label for="">Email</label>
          <input type="email" id="Email" name="email" placeholder="Masukkan Email">
          <label for="">$</label>
          <input type="number" id="nominal" name="nominal" placeholder="Masukkan Nominal Transaksi">
          <label for="">Method</label>
          <input type="text" id="method" name="method" placeholder="Masukkan Metode Transaksi">
          <div class="token">
            <h1>Token</h1>
            @if(session()->has('get_code'))
              <p>{{ session('get_code') }}</p>
            @else
              <p>XXX-XXX</p>
            @endif
          </div>
          <button type="submit">Generate</button>
        </form>
      </div>
    </div>  
  </section>
@endsection
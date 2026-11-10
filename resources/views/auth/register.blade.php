@extends('layouts.app')
@section('title', 'Register - Cisco Netriders')

@section('content')
<div class="page"><div class="wrap narrow">
  <h1>Register</h1>
  <p class="sub">Buat akun baru UKM Cisco Netriders.</p>
  <form method="POST" action="{{ route('register') }}" class="box">
    @csrf
    <label for="name">Nama</label>
    <input id="name" name="name" value="{{ old('name') }}" autofocus>
    @error('name') <div class="err">{{ $message }}</div> @enderror

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @error('email') <div class="err">{{ $message }}</div> @enderror

    <label for="password">Password</label>
    <input id="password" type="password" name="password">
    @error('password') <div class="err">{{ $message }}</div> @enderror

    <label for="password_confirmation">Konfirmasi password</label>
    <input id="password_confirmation" type="password" name="password_confirmation">

    <p style="margin:20px 0 0"><button class="btn btn-blue">Register</button>
      <a href="{{ route('login') }}" style="margin-left:12px;font-size:13px;color:var(--blue)">Sudah punya akun? Login</a></p>
  </form>
</div></div>
@endsection

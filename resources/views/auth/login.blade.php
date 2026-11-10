@extends('layouts.app')
@section('title', 'Login - Cisco Netriders')

@section('content')
<div class="page"><div class="wrap narrow">
  <h1>Login</h1>
  <p class="sub">Masuk ke akun UKM Cisco Netriders.</p>
  <form method="POST" action="{{ route('login') }}" class="box">
    @csrf
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus>
    @error('email') <div class="err">{{ $message }}</div> @enderror

    <label for="password">Password</label>
    <input id="password" type="password" name="password">
    @error('password') <div class="err">{{ $message }}</div> @enderror

    <label style="display:flex;gap:8px;align-items:center;font-weight:400">
      <input type="checkbox" name="remember" value="1" style="width:auto"> Ingat saya
    </label>
    <p style="margin:20px 0 0"><button class="btn btn-blue">Login</button>
      <a href="{{ route('register') }}" style="margin-left:12px;font-size:13px;color:var(--blue)">Belum punya akun? Register</a></p>
  </form>
</div></div>
@endsection

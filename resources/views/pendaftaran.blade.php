@extends('layouts.app')
@section('title', 'Pendaftaran - Cisco Netriders')

@section('content')
<div class="page"><div class="wrap narrow">
  <h1>Pendaftaran pelatihan</h1>
  <p class="sub">Isi nama, NIM, dan kelas. Pendaftaran gratis.</p>

  @if (session('success')) <div class="ok">{{ session('success') }}</div> @endif

  <form method="POST" action="{{ route('pendaftaran.store') }}" class="box">
    @csrf
    <label for="pelatihan_id">Pelatihan</label>
    <select id="pelatihan_id" name="pelatihan_id">
      @foreach ($pelatihans as $p)
        @php $penuh = $p->pendaftarans_count >= $p->kuota; @endphp
        <option value="{{ $p->id }}" @disabled($penuh) @selected(old('pelatihan_id', $terpilih) == $p->id)>
          {{ $p->judul }} ({{ $p->pendaftarans_count }}/{{ $p->kuota }}{{ $penuh ? ', penuh' : '' }})
        </option>
      @endforeach
    </select>
    @error('pelatihan_id') <div class="err">{{ $message }}</div> @enderror

    <label for="nama">Nama lengkap</label>
    <input id="nama" name="nama" value="{{ old('nama') }}">
    @error('nama') <div class="err">{{ $message }}</div> @enderror

    <label for="nim">NIM</label>
    <input id="nim" name="nim" value="{{ old('nim') }}">
    @error('nim') <div class="err">{{ $message }}</div> @enderror

    <label for="kelas">Kelas</label>
    <input id="kelas" name="kelas" value="{{ old('kelas') }}">
    @error('kelas') <div class="err">{{ $message }}</div> @enderror

    <p style="margin:20px 0 0"><button class="btn btn-blue">Kirim pendaftaran</button></p>
  </form>
</div></div>
@endsection

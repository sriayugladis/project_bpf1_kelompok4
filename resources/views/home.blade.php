@extends('layouts.app')
@section('title', 'UKM Cisco Netriders Community')

@section('content')
<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="tag">UKM Cisco Netriders Community</span>
      <h1>Pusat Informasi Pelatihan <span class="hl">Cisco Netriders Community</span></h1>
      <p>Informasi pelatihan, pendaftaran peserta, dan materi pembelajaran tersedia dalam satu sistem.</p>
      <div class="btns">
        <a href="#kontak" class="btn btn-white">Hubungi kami</a>
        <a href="{{ route('modul') }}" class="btn btn-line">Modul Pembelajaran</a>
      </div>
    </div>

    <div class="photo">
      <span class="lbl">Pelatihan Cisco</span>
      {{-- Taruh foto kegiatan di public/images/hero.jpg --}}
      @if (file_exists(public_path('images/hero.jpg')))
        <img src="{{ asset('images/hero.jpg') }}" alt="Pelatihan Cisco Netriders">
      @else
        <div class="ph">Letakkan foto kegiatan di<br>public/images/hero.jpg</div>
      @endif
    </div>
  </div>

  <div class="wrap">
    <div class="stats">
      <div class="stat"><b>{{ $jumlahPelatihan }}</b><span>Pelatihan yang tersedia</span></div>
      <div class="stat"><b>{{ $jumlahModul }}</b><span>Modul yang tersedia</span></div>
      <div class="stat"><b>{{ $jumlahPeserta }}</b><span>Peserta terdaftar</span></div>
    </div>
  </div>
</section>

<section class="dark">
  <div class="wrap">
    <h2>Pelatihan terdekat</h2>
    <div class="grid">
      @forelse ($pelatihans as $p)
        @php
          $terisi = $p->pendaftarans_count;
          $penuh  = $terisi >= $p->kuota;
          $pct    = min(100, round($terisi / max(1, $p->kuota) * 100));
        @endphp
        <div class="card">
          <h3>{{ $p->judul }}</h3>
          <div class="meta">{{ $p->tanggal->locale('id')->translatedFormat('l, d M') }} · {{ $p->tempat }}</div>
          <div class="bar"><i style="width:{{ $pct }}%"></i></div>
          <div class="cnt">{{ $terisi }}/{{ $p->kuota }} peserta</div>
          <a href="{{ route('pendaftaran', ['pelatihan' => $p->id]) }}" class="btn btn-dark {{ $penuh ? 'off' : '' }}">{{ $penuh ? 'Kuota penuh' : 'Daftar' }}</a>
        </div>
      @empty
        <p>Belum ada jadwal pelatihan terdekat.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection

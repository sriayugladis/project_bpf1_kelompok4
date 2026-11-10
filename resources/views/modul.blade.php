@extends('layouts.app')
@section('title', 'Modul Pembelajaran - Cisco Netriders')

@section('content')
<div class="page"><div class="wrap">
  <h1>Modul pembelajaran</h1>
  <p class="sub">Baca atau unduh modul kapan saja untuk belajar ulang.</p>

  <div class="chips">
    <a href="{{ route('modul') }}" class="chip {{ !$level ? 'on' : '' }}">Semua</a>
    @foreach (['dasar', 'menengah', 'lanjut'] as $l)
      <a href="{{ route('modul', ['level' => $l]) }}" class="chip {{ $level === $l ? 'on' : '' }}">{{ ucfirst($l) }}</a>
    @endforeach
  </div>

  <div class="box" style="padding:0;overflow:hidden">
    <table>
      <thead><tr><th>Pertemuan</th><th>Judul</th><th>Level</th><th>Materi</th></tr></thead>
      <tbody>
        @forelse ($moduls as $m)
          <tr>
            <td>{{ $m->pertemuan }}</td>
            <td>{{ $m->judul }}</td>
            <td><span class="badge">{{ $m->level }}</span></td>
            <td>@if ($m->link) <a href="{{ $m->link }}" target="_blank" rel="noopener" style="color:var(--blue);font-weight:600">Buka modul</a> @else - @endif</td>
          </tr>
        @empty
          <tr><td colspan="4" style="text-align:center;color:var(--muted)">Belum ada modul untuk level ini.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div></div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', 'UKM Cisco Netriders Community')</title>
<style>
:root{--blue:#2f7be0;--blue-d:#1f5fb8;--navy:#0f1115;--yellow:#ffd966;--line:#2a2f36;--ink:#1c2430;--muted:#6b7686}
*{box-sizing:border-box}
body{margin:0;font-family:Inter,system-ui,-apple-system,"Segoe UI",sans-serif;color:var(--ink);background:#f4f7fb;line-height:1.5}
a{color:inherit;text-decoration:none}
.wrap{max-width:1100px;margin:0 auto;padding:0 20px}

/* Navbar */
.nav{background:var(--blue);color:#fff}
.nav .wrap{display:flex;align-items:center;gap:28px;height:64px}
.nav .logo img{height:34px;display:block}
.nav .links{display:flex;gap:22px;font-size:14px;font-weight:600;flex:1}
.nav .links a{opacity:.9;padding:4px 0;border-bottom:2px solid transparent}
.nav .links a:hover,.nav .links a.on{opacity:1;border-color:#fff}
.nav .auth{display:flex;gap:8px;align-items:center;font-size:13px}
.nav form{margin:0}

/* Tombol */
.btn{display:inline-block;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:700;border:1px solid transparent;cursor:pointer;font-family:inherit}
.btn-white{background:#fff;color:var(--blue)}
.btn-line{background:transparent;color:#fff;border-color:rgba(255,255,255,.7)}
.btn-blue{background:var(--blue);color:#fff}
.btn-blue:hover{background:var(--blue-d)}
.btn-dark{background:transparent;color:#fff;border-color:var(--line)}
.btn-dark:hover{border-color:#fff}
.btn[disabled],.btn.off{opacity:.45;pointer-events:none}

/* Hero */
.hero{background:var(--blue);color:#fff;padding:56px 0 0}
.hero-grid{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center}
.tag{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.04em;background:rgba(255,255,255,.16);padding:6px 12px;border-radius:6px;margin-bottom:16px}
.hero h1{font-size:40px;line-height:1.1;margin:0 0 16px}
.hl{color:var(--yellow)}
.hero p{margin:0 0 24px;opacity:.9;max-width:44ch}
.hero .btns{display:flex;gap:10px;flex-wrap:wrap}
.photo{position:relative;background:#fff;border-radius:14px;padding:8px;box-shadow:0 8px 0 -2px rgba(255,255,255,.7),0 16px 0 -4px rgba(255,255,255,.45)}
.photo .lbl{position:absolute;top:14px;left:14px;background:var(--blue);color:#fff;font-size:12px;font-weight:700;padding:4px 10px;border-radius:6px}
.photo img,.photo .ph{width:100%;height:260px;object-fit:cover;border-radius:10px;display:block}
.photo .ph{background:linear-gradient(135deg,#0f3c7a,#2f7be0);display:grid;place-items:center;color:#cfe2ff;font-size:13px;text-align:center;padding:20px}
.stats{background:#fff;color:var(--ink);border-radius:14px;margin:48px auto -40px;display:grid;grid-template-columns:repeat(3,1fr);box-shadow:0 6px 20px rgba(15,40,90,.15);position:relative;max-width:820px}
.stat{padding:20px;text-align:center}
.stat+.stat{border-left:1px solid #e3e8f0}
.stat b{display:block;font-size:22px;color:var(--blue)}
.stat span{font-size:13px;color:var(--muted)}

/* Pelatihan terdekat (tema gelap) */
.dark{background:var(--navy);color:#fff;padding:88px 0 56px}
.dark h2{font-size:22px;margin:0 0 20px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.card{border:1px solid var(--line);border-radius:12px;padding:18px;background:#14181e}
.card h3{font-size:15px;margin:0 0 4px}
.card .meta{font-size:12px;color:#9aa5b5;margin-bottom:14px}
.bar{height:5px;border-radius:5px;background:#262c35;overflow:hidden;margin-bottom:6px}
.bar i{display:block;height:100%;background:var(--blue)}
.card .cnt{font-size:12px;color:#9aa5b5;margin-bottom:14px}

/* Halaman dalam */
.page{padding:40px 0 64px}
.page h1{margin:0 0 4px;font-size:26px}
.page .sub{color:var(--muted);margin:0 0 24px}
.box{background:#fff;border:1px solid #e3e8f0;border-radius:12px;padding:24px}
label{display:block;font-size:13px;font-weight:600;margin:14px 0 6px}
input,select{width:100%;padding:10px 12px;border:1px solid #cfd7e3;border-radius:8px;font:inherit;background:#fff}
input:focus,select:focus{outline:2px solid var(--blue);border-color:transparent}
.err{color:#c0392b;font-size:12px;margin-top:4px}
.ok{background:#e7f7ee;color:#17693c;border:1px solid #b9e4cb;border-radius:8px;padding:12px 16px;margin-bottom:16px;font-size:14px}
.narrow{max-width:440px;margin:0 auto}
table{width:100%;border-collapse:collapse;font-size:14px}
th,td{text-align:left;padding:12px 14px;border-bottom:1px solid #eef1f6}
th{font-size:12px;color:var(--muted);background:#f8fafd}
.chips{display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap}
.chip{padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600;background:#fff;border:1px solid #cfd7e3}
.chip.on{background:var(--blue);color:#fff;border-color:var(--blue)}
.badge{font-size:12px;padding:2px 10px;border-radius:12px;background:#e8f0fd;color:var(--blue-d);font-weight:600}

footer{background:var(--navy);color:#9aa5b5;font-size:13px;padding:28px 0;border-top:1px solid var(--line)}
footer b{color:#fff}

@media(max-width:800px){
 .hero-grid,.grid{grid-template-columns:1fr}
 .hero h1{font-size:30px}
 .stats{grid-template-columns:1fr}
 .stat+.stat{border-left:0;border-top:1px solid #e3e8f0}
 .nav .wrap{flex-wrap:wrap;height:auto;padding-top:12px;padding-bottom:12px;gap:12px}
}
</style>
</head>
<body>

<nav class="nav">
  <div class="wrap">
    <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/cisco-logo.svg') }}" alt="Cisco"></a>
    <div class="links">
      <a href="{{ route('pendaftaran') }}" class="{{ request()->routeIs('pendaftaran') ? 'on' : '' }}">Pendaftaran</a>
      <a href="{{ route('modul') }}" class="{{ request()->routeIs('modul') ? 'on' : '' }}">Modul</a>
    </div>
    <div class="auth">
      @auth
        <span>{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-line">Logout</button></form>
      @else
        <a href="{{ route('login') }}" class="btn btn-line">Login</a>
        <a href="{{ route('register') }}" class="btn btn-white">Register</a>
      @endauth
    </div>
  </div>
</nav>

@yield('content')

<footer id="kontak">
  <div class="wrap">
    <b>UKM Cisco Netriders Community</b><br>
    {{-- GANTI dengan kontak asli UKM --}}
    Hubungi kami: cisconetriders@contoh.ac.id
  </div>
</footer>

</body>
</html>

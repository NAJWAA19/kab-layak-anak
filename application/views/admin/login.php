<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Layak Anak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:Arial,sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0d47a1 0%,#1976d2 48%,#7b1fa2 100%);padding:20px;position:relative;overflow:hidden;}
        body::before{content:"";position:absolute;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.12),transparent 65%);top:-200px;right:-150px;}
        body::after{content:"";position:absolute;width:350px;height:350px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.08),transparent 65%);bottom:-150px;left:-100px;}
        .login-container{width:100%;max-width:420px;position:relative;z-index:1;}
        .login-box{background:rgba(255,255,255,.95);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);padding:40px 36px;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.25);border:1px solid rgba(255,255,255,.3);}
        .login-header{text-align:center;margin-bottom:32px;}
        .login-logo{display:flex;align-items:center;justify-content:center;gap:14px;margin:0 auto 18px;}
        .login-logo img{width:56px;height:56px;object-fit:contain;filter:drop-shadow(0 4px 12px rgba(0,0,0,.15));}
        .login-header h1{font-size:26px;color:#172033;margin-bottom:8px;}
        .login-header p{color:#64748b;line-height:1.6;font-size:14px;}
        .form-group{margin-bottom:20px;}
        .form-group label{display:block;margin-bottom:8px;font-size:13px;font-weight:700;color:#334155;}
        .form-group input{width:100%;padding:13px 15px;border:1px solid #d1d5db;border-radius:10px;font-size:15px;outline:none;transition:.2s;background:#f9fafb;}
        .form-group input:focus{border-color:#1976d2;box-shadow:0 0 0 3px rgba(25,118,210,.1);background:#fff;}
        .login-button{width:100%;padding:14px;border:none;border-radius:10px;background:linear-gradient(135deg,#1976d2,#7b1fa2);color:#fff;font-size:15px;font-weight:700;cursor:pointer;transition:.2s;box-shadow:0 6px 20px rgba(25,118,210,.35);}
        .login-button:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(25,118,210,.45);}
        .login-error{min-height:20px;margin-bottom:12px;color:#d32f2f;font-size:14px;text-align:center;}
        .login-back{margin-top:24px;text-align:center;}
        .login-back a{color:rgba(255,255,255,.8);text-decoration:none;font-size:13px;transition:.2s;}
        .login-back a:hover{color:#fff;}
        .login-back a i{margin-right:6px;}

        .login-bg{position:fixed;inset:0;pointer-events:none;z-index:0;overflow:hidden;}

        .bg-sun{position:absolute;width:110px;top:5%;right:12%;animation:sunPulse 8s ease-in-out infinite;}
        @keyframes sunPulse{0%,100%{opacity:.9;transform:scale(1);}50%{opacity:1;transform:scale(1.05);}}

        .bg-cloud{position:absolute;animation:cloudDrift 50s linear infinite;}
        .c1{width:220px;top:5%;right:-60px;animation-duration:40s;}
        .c2{width:180px;top:16%;left:-50px;animation-duration:55s;animation-delay:-12s;}
        .c3{width:150px;top:28%;right:8%;animation-duration:60s;animation-delay:-25s;}
        @keyframes cloudDrift{0%{transform:translateX(0);}50%{transform:translateX(50px);}100%{transform:translateX(0);}}

        .bg-birds{position:absolute;}
        .bird-group-1{top:12%;left:25%;animation:birdFly1 22s ease-in-out infinite;}
        .bird-group-2{top:20%;right:18%;animation:birdFly2 28s ease-in-out infinite;}
        .bird-group-1 svg{width:45px;}
        .bird-group-2 svg{width:35px;}
        @keyframes birdFly1{0%{transform:translate(0,0);}25%{transform:translate(70px,-18px);}50%{transform:translate(140px,8px);}75%{transform:translate(70px,-12px);}100%{transform:translate(0,0);}}
        @keyframes birdFly2{0%{transform:translate(0,0);}25%{transform:translate(-50px,-12px);}50%{transform:translate(-100px,5px);}75%{transform:translate(-50px,-8px);}100%{transform:translate(0,0);}}

        .bg-tree{position:absolute;bottom:0;}
        .tree-left-big{left:2%;width:110px;opacity:.85;}
        .tree-left-sm{left:10%;width:70px;opacity:.65;animation:treeSway 7s ease-in-out infinite;}
        .tree-right-big{right:3%;width:95px;opacity:.75;}
        .tree-right-sm{right:11%;width:60px;opacity:.55;animation:treeSway 6s ease-in-out infinite reverse;}
        @keyframes treeSway{0%,100%{transform:rotate(0);}50%{transform:rotate(1.2deg);}}

        .bg-child{position:absolute;bottom:0;}
        .child-1{left:18%;width:42px;animation:childBounce 3s ease-in-out infinite;}
        .child-2{right:17%;width:38px;animation:childBounce 3.5s ease-in-out infinite .5s;}
        .child-3{left:38%;width:35px;opacity:.7;}
        @keyframes childBounce{0%,100%{transform:translateY(0);}50%{transform:translateY(-6px);}}

        .bg-ground{position:absolute;bottom:0;left:0;width:100%;}

        .bg-flower{position:absolute;bottom:0;}
        .f1{left:22%;width:16px;animation:flowerSway 4s ease-in-out infinite;}
        .f2{right:24%;width:14px;animation:flowerSway 4.5s ease-in-out infinite .3s;}
        .f3{left:42%;width:12px;animation:flowerSway 5s ease-in-out infinite .8s;}
        @keyframes flowerSway{0%,100%{transform:rotate(0);}50%{transform:rotate(3deg);}}

        .bg-butterfly{position:absolute;animation:butterflyFloat 8s ease-in-out infinite;}
        .bf1{top:30%;left:20%;width:22px;}
        .bf2{top:38%;right:22%;width:18px;animation-delay:-3s;animation-duration:10s;}
        @keyframes butterflyFloat{0%{transform:translate(0,0) rotate(0);}20%{transform:translate(15px,-12px) rotate(5deg);}40%{transform:translate(30px,4px) rotate(-3deg);}60%{transform:translate(15px,-8px) rotate(4deg);}80%{transform:translate(-5px,6px) rotate(-2deg);}100%{transform:translate(0,0) rotate(0);}}

        @media(max-width:700px){
            .bg-tree,.bg-child,.bg-flower,.bg-butterfly{display:none;}
            .bg-cloud{opacity:.5;}
            .bg-sun{width:80px;top:3%;right:5%;}
        }
    </style>
</head>
<body>
    <div class="login-bg" aria-hidden="true">
        <!-- Matahari -->
        <svg class="bg-sun" viewBox="0 0 120 120" fill="none">
            <circle cx="60" cy="60" r="28" fill="rgba(255,220,100,.15)"/>
            <circle cx="60" cy="60" r="20" fill="rgba(255,230,120,.12)"/>
            <g stroke="rgba(255,220,100,.1)" stroke-width="2.5" stroke-linecap="round">
                <line x1="60" y1="10" x2="60" y2="22"/><line x1="60" y1="98" x2="60" y2="110"/>
                <line x1="10" y1="60" x2="22" y2="60"/><line x1="98" y1="60" x2="110" y2="60"/>
                <line x1="25" y1="25" x2="33" y2="33"/><line x1="87" y1="87" x2="95" y2="95"/>
                <line x1="95" y1="25" x2="87" y2="33"/><line x1="33" y1="87" x2="25" y2="95"/>
            </g>
        </svg>

        <!-- Awan-awan -->
        <svg class="bg-cloud c1" viewBox="0 0 240 90" fill="none">
            <ellipse cx="80" cy="55" rx="65" ry="30" fill="rgba(255,255,255,.10)"/>
            <ellipse cx="130" cy="48" rx="52" ry="26" fill="rgba(255,255,255,.08)"/>
            <ellipse cx="55" cy="60" rx="42" ry="22" fill="rgba(255,255,255,.07)"/>
            <ellipse cx="170" cy="52" rx="38" ry="18" fill="rgba(255,255,255,.06)"/>
        </svg>
        <svg class="bg-cloud c2" viewBox="0 0 200 80" fill="none">
            <ellipse cx="70" cy="48" rx="55" ry="25" fill="rgba(255,255,255,.09)"/>
            <ellipse cx="120" cy="42" rx="45" ry="22" fill="rgba(255,255,255,.07)"/>
            <ellipse cx="48" cy="52" rx="35" ry="18" fill="rgba(255,255,255,.06)"/>
        </svg>
        <svg class="bg-cloud c3" viewBox="0 0 170 65" fill="none">
            <ellipse cx="58" cy="40" rx="48" ry="22" fill="rgba(255,255,255,.07)"/>
            <ellipse cx="100" cy="36" rx="40" ry="18" fill="rgba(255,255,255,.05)"/>
        </svg>

        <!-- Burung-burung -->
        <div class="bg-birds bird-group-1">
            <svg viewBox="0 0 50 16" fill="none">
                <path d="M2 10c5-7 10-7 13 0" stroke="rgba(255,255,255,.14)" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M20 8c4-6 8-6 10 0" stroke="rgba(255,255,255,.11)" stroke-width="1.3" stroke-linecap="round"/>
                <path d="M35 11c3-5 6-5 8 0" stroke="rgba(255,255,255,.09)" stroke-width="1.1" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="bg-birds bird-group-2">
            <svg viewBox="0 0 40 14" fill="none">
                <path d="M2 9c4-6 8-6 10 0" stroke="rgba(255,255,255,.10)" stroke-width="1.3" stroke-linecap="round"/>
                <path d="M18 7c3-5 6-5 8 0" stroke="rgba(255,255,255,.08)" stroke-width="1.1" stroke-linecap="round"/>
            </svg>
        </div>

        <!-- Pohon kiri besar -->
        <svg class="bg-tree tree-left-big" viewBox="0 0 120 200" fill="none">
            <rect x="52" y="140" width="16" height="55" rx="4" fill="rgba(255,255,255,.10)"/>
            <ellipse cx="60" cy="110" rx="48" ry="44" fill="rgba(255,255,255,.08)"/>
            <ellipse cx="60" cy="95" rx="38" ry="35" fill="rgba(255,255,255,.06)"/>
            <ellipse cx="60" cy="80" rx="28" ry="26" fill="rgba(255,255,255,.05)"/>
        </svg>

        <!-- Pohon kiri kecil -->
        <svg class="bg-tree tree-left-sm" viewBox="0 0 80 140" fill="none">
            <rect x="34" y="100" width="12" height="36" rx="3" fill="rgba(255,255,255,.09)"/>
            <ellipse cx="40" cy="78" rx="32" ry="30" fill="rgba(255,255,255,.07)"/>
            <ellipse cx="40" cy="65" rx="24" ry="22" fill="rgba(255,255,255,.05)"/>
        </svg>

        <!-- Pohon kanan besar -->
        <svg class="bg-tree tree-right-big" viewBox="0 0 100 180" fill="none">
            <rect x="42" y="128" width="14" height="48" rx="4" fill="rgba(255,255,255,.09)"/>
            <ellipse cx="50" cy="100" rx="42" ry="40" fill="rgba(255,255,255,.07)"/>
            <ellipse cx="50" cy="86" rx="32" ry="30" fill="rgba(255,255,255,.05)"/>
        </svg>

        <!-- Pohon kanan kecil -->
        <svg class="bg-tree tree-right-sm" viewBox="0 0 70 120" fill="none">
            <rect x="30" y="86" width="10" height="30" rx="3" fill="rgba(255,255,255,.08)"/>
            <ellipse cx="35" cy="68" rx="28" ry="26" fill="rgba(255,255,255,.06)"/>
            <ellipse cx="35" cy="56" rx="20" ry="18" fill="rgba(255,255,255,.04)"/>
        </svg>

        <!-- Anak-anak bermain -->
        <!-- Anak 1: berlari -->
        <svg class="bg-child child-1" viewBox="0 0 50 70" fill="none">
            <circle cx="28" cy="12" r="8" fill="rgba(255,255,255,.10)"/>
            <path d="M22 22c0 0 2 18 2 28l-8 14" stroke="rgba(255,255,255,.08)" stroke-width="3" stroke-linecap="round"/>
            <path d="M24 50l8 16" stroke="rgba(255,255,255,.08)" stroke-width="3" stroke-linecap="round"/>
            <path d="M24 30l-10 8" stroke="rgba(255,255,255,.08)" stroke-width="3" stroke-linecap="round"/>
            <path d="M24 32l12 4" stroke="rgba(255,255,255,.08)" stroke-width="3" stroke-linecap="round"/>
        </svg>

        <!-- Anak 2: melompat -->
        <svg class="bg-child child-2" viewBox="0 0 50 70" fill="none">
            <circle cx="25" cy="10" r="7" fill="rgba(255,255,255,.09)"/>
            <path d="M20 19c0 0 3 16 3 24" stroke="rgba(255,255,255,.07)" stroke-width="3" stroke-linecap="round"/>
            <path d="M23 43l-6 18" stroke="rgba(255,255,255,.07)" stroke-width="3" stroke-linecap="round"/>
            <path d="M23 43l8 14" stroke="rgba(255,255,255,.07)" stroke-width="3" stroke-linecap="round"/>
            <path d="M22 26l-10-4" stroke="rgba(255,255,255,.07)" stroke-width="3" stroke-linecap="round"/>
            <path d="M22 28l10-6" stroke="rgba(255,255,255,.07)" stroke-width="3" stroke-linecap="round"/>
        </svg>

        <!-- Anak 3: berdiri -->
        <svg class="bg-child child-3" viewBox="0 0 45 70" fill="none">
            <circle cx="22" cy="11" r="7" fill="rgba(255,255,255,.08)"/>
            <path d="M18 20c0 0 2 18 2 26" stroke="rgba(255,255,255,.07)" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M20 46l-5 18" stroke="rgba(255,255,255,.07)" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M20 46l7 14" stroke="rgba(255,255,255,.07)" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M19 28l-8-2" stroke="rgba(255,255,255,.07)" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M19 30l8-8" stroke="rgba(255,255,255,.07)" stroke-width="2.5" stroke-linecap="round"/>
        </svg>

        <!-- Rumput & bunga -->
        <svg class="bg-ground" viewBox="0 0 1440 120" fill="none">
            <path d="M0 120V80c80-25 180-40 300-35s240 25 360 30 240-15 360-25 200 10 320 20v50z" fill="rgba(255,255,255,.04)"/>
            <path d="M0 120V90c100-20 200-30 340-25s220 20 340 28 220-12 340-18 180 8 300 15v30z" fill="rgba(255,255,255,.03)"/>
        </svg>

        <!-- Bunga-bunga kecil -->
        <svg class="bg-flower f1" viewBox="0 0 20 30" fill="none">
            <line x1="10" y1="14" x2="10" y2="28" stroke="rgba(255,255,255,.10)" stroke-width="1.5"/>
            <circle cx="10" cy="10" r="4" fill="rgba(255,180,200,.10)"/>
            <circle cx="10" cy="10" r="2" fill="rgba(255,220,100,.08)"/>
        </svg>
        <svg class="bg-flower f2" viewBox="0 0 18 26" fill="none">
            <line x1="9" y1="12" x2="9" y2="24" stroke="rgba(255,255,255,.08)" stroke-width="1.2"/>
            <circle cx="9" cy="8" r="3.5" fill="rgba(200,180,255,.09)"/>
            <circle cx="9" cy="8" r="1.8" fill="rgba(255,220,100,.07)"/>
        </svg>
        <svg class="bg-flower f3" viewBox="0 0 16 24" fill="none">
            <line x1="8" y1="10" x2="8" y2="22" stroke="rgba(255,255,255,.07)" stroke-width="1"/>
            <circle cx="8" cy="7" r="3" fill="rgba(180,220,255,.08)"/>
            <circle cx="8" cy="7" r="1.5" fill="rgba(255,220,100,.06)"/>
        </svg>

        <!-- Kupu-kupu -->
        <div class="bg-butterfly bf1">
            <svg viewBox="0 0 24 20" fill="none">
                <ellipse cx="8" cy="8" rx="6" ry="5" fill="rgba(255,180,220,.10)" transform="rotate(-15 8 8)"/>
                <ellipse cx="16" cy="8" rx="6" ry="5" fill="rgba(255,180,220,.10)" transform="rotate(15 16 8)"/>
                <ellipse cx="9" cy="13" rx="4" ry="3.5" fill="rgba(255,200,230,.08)" transform="rotate(-10 9 13)"/>
                <ellipse cx="15" cy="13" rx="4" ry="3.5" fill="rgba(255,200,230,.08)" transform="rotate(10 15 13)"/>
                <line x1="12" y1="6" x2="12" y2="16" stroke="rgba(255,255,255,.10)" stroke-width="1"/>
            </svg>
        </div>
        <div class="bg-butterfly bf2">
            <svg viewBox="0 0 20 18" fill="none">
                <ellipse cx="7" cy="7" rx="5" ry="4" fill="rgba(180,200,255,.08)" transform="rotate(-12 7 7)"/>
                <ellipse cx="13" cy="7" rx="5" ry="4" fill="rgba(180,200,255,.08)" transform="rotate(12 13 7)"/>
                <line x1="10" y1="5" x2="10" y2="14" stroke="rgba(255,255,255,.08)" stroke-width="0.8"/>
            </svg>
        </div>
    </div>

    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="login-logo">
                    <img src="<?php echo base_url('assets/img/logo-dinsos.png'); ?>" alt="Logo Dinas Sosial">
                    <img src="<?php echo base_url('assets/img/logo-kla.png'); ?>" alt="Logo KLA">
                </div>
                <h1>Login Admin</h1>
                <p>Silakan masuk untuk mengelola informasi Website Layak Anak.</p>
            </div>
            <form action="<?php echo site_url('admin-login/auth'); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <?php if ($this->session->flashdata('error')): ?><p class="login-error"><?php echo $this->session->flashdata('error'); ?></p><?php endif; ?>
                <?php if ($this->session->flashdata('success')): ?><p class="login-error" style="color:#16a34a;"><?php echo $this->session->flashdata('success'); ?></p><?php endif; ?>
                <button type="submit" class="login-button">Masuk sebagai Admin</button>
            </form>
            <div class="login-back">
                <a href="<?php echo site_url('/'); ?>"><i class="fa-solid fa-arrow-left"></i>Kembali ke Website</a>
            </div>
        </div>
    </div>
</body>
</html>

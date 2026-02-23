<?php
error_reporting(0);
ini_set('display_errors', 0);

$url_logo = $_GET['logo'] ?? '';
$estilo = (int)($_GET['estilo'] ?? 1);
$img_predeterminada = "https://ik.imagekit.io/pm10ywrf6f/bot_by_deylin/1769830823123_e336030d2dfd15b3f2a9bec8d30e15f3_YZEsD9KKM.jpg";

// ===== DASHBOARD PRIDE ULTRA-LUXE =====
if (empty($url_logo)) {
    $presets_meta = [
        1  => ['label' => '🏳️‍🌈 PRIDE WAVE',      'desc' => 'Ondas arcoíris explosivas'],
        2  => ['label' => '💜 BISEXUAL NEON',   'desc' => 'Cyber bi-magenta'],
        3  => ['label' => '🌈 RAINBOW FIRE',    'desc' => 'Fuego de todos los colores'],
        4  => ['label' => '🦋 TRANS CIELO',     'desc' => 'Azul y rosa pastel trans'],
        5  => ['label' => '⚡ QUEER VOLTAJE',   'desc' => 'Energía eléctrica queer'],
        6  => ['label' => '🌸 LESBIAN SUNSET',  'desc' => 'Atardecer lesbiana naranja-rosa'],
        7  => ['label' => '🖤 DARK PRIDE',      'desc' => 'Orgullo oscuro y elegante'],
        8  => ['label' => '✨ GLITTER QUEEN',   'desc' => 'Purpurina y glamour total'],
        9  => ['label' => '🌊 PROGRESS FLAG',   'desc' => 'Bandera progreso moderna'],
        10 => ['label' => '👑 ROYAL PRIDE',     'desc' => 'Realeza arcoíris de lujo'],
    ];
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✨ DEYLIN PRIDE SYSTEMS | ULTRA LUXE BANNER LAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --r: #FF0018; --o: #FFA52C; --y: #FFFF41; --g: #008018;
            --b: #0000F9; --v: #86007D;
            --trans-blue: #55CDFC; --trans-pink: #F7A8B8;
            --bg-deep: #050508; --bg-card: rgba(255,255,255,0.04);
            --glow: 0 0 40px rgba(255,100,200,0.3);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: var(--bg-deep);
            font-family: 'DM Sans', sans-serif;
            color: #fff;
            overflow-x: hidden;
            cursor: none;
        }

        /* CURSOR CUSTOM */
        .cursor {
            position: fixed; pointer-events: none; z-index: 9999;
            width: 20px; height: 20px; border-radius: 50%;
            background: conic-gradient(#FF0018, #FFA52C, #FFFF41, #008018, #0000F9, #86007D, #FF0018);
            mix-blend-mode: screen;
            transition: transform 0.1s ease;
            transform: translate(-50%, -50%);
        }
        .cursor-trail {
            position: fixed; pointer-events: none; z-index: 9998;
            width: 8px; height: 8px; border-radius: 50%;
            background: white; opacity: 0.5;
            transition: all 0.3s ease;
            transform: translate(-50%, -50%);
        }

        /* BACKGROUND ANIMADO */
        .bg-canvas {
            position: fixed; inset: 0; z-index: 0;
            overflow: hidden;
        }

        /* Stripes de la bandera pride como fondo */
        .pride-stripe {
            position: absolute;
            width: 150%;
            height: 16.666%;
            transform-origin: left center;
            opacity: 0.07;
            animation: stripeFloat 8s ease-in-out infinite;
        }
        .pride-stripe:nth-child(1) { top: 0%;        background: var(--r); animation-delay: 0s; }
        .pride-stripe:nth-child(2) { top: 16.666%;   background: var(--o); animation-delay: 0.3s; }
        .pride-stripe:nth-child(3) { top: 33.333%;   background: var(--y); animation-delay: 0.6s; }
        .pride-stripe:nth-child(4) { top: 50%;       background: var(--g); animation-delay: 0.9s; }
        .pride-stripe:nth-child(5) { top: 66.666%;   background: var(--b); animation-delay: 1.2s; }
        .pride-stripe:nth-child(6) { top: 83.333%;   background: var(--v); animation-delay: 1.5s; }

        @keyframes stripeFloat {
            0%, 100% { transform: skewY(-1deg) translateX(-2%); opacity: 0.07; }
            50% { transform: skewY(1deg) translateX(2%); opacity: 0.12; }
        }

        /* PARTÍCULAS FLOTANTES */
        .particle {
            position: absolute;
            border-radius: 50%;
            animation: particleRise linear infinite;
            opacity: 0;
        }
        @keyframes particleRise {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-100px) scale(1.5); opacity: 0; }
        }

        /* LAYOUT */
        .page-wrapper {
            position: relative; z-index: 10;
            min-height: 100vh;
            display: flex; flex-direction: column;
            padding: 0;
        }

        /* HERO HEADER */
        .hero-header {
            text-align: center;
            padding: 60px 20px 40px;
            position: relative;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--r), var(--o), var(--y), var(--g), var(--b), var(--v), var(--r));
            background-size: 200% 100%;
            animation: rainbowSlide 3s linear infinite;
        }

        @keyframes rainbowSlide {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 0%; }
        }

        .badge-pride {
            display: inline-block;
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03));
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 100px;
            padding: 6px 20px;
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 24px;
            color: rgba(255,255,255,0.6);
        }

        .main-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 900;
            line-height: 0.9;
            letter-spacing: -2px;
            margin-bottom: 16px;
        }

        .title-pride {
            background: linear-gradient(135deg, var(--r) 0%, var(--o) 20%, var(--y) 40%, var(--g) 60%, var(--b) 80%, var(--v) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            animation: hueShift 6s linear infinite;
            filter: drop-shadow(0 0 30px rgba(255,100,200,0.5));
        }

        @keyframes hueShift {
            0% { filter: drop-shadow(0 0 30px rgba(255,0,24,0.6)) hue-rotate(0deg); }
            33% { filter: drop-shadow(0 0 30px rgba(0,134,255,0.6)) hue-rotate(120deg); }
            66% { filter: drop-shadow(0 0 30px rgba(134,0,125,0.6)) hue-rotate(240deg); }
            100% { filter: drop-shadow(0 0 30px rgba(255,0,24,0.6)) hue-rotate(360deg); }
        }

        .title-systems {
            color: rgba(255,255,255,0.15);
            letter-spacing: 8px;
            font-size: 0.4em;
            font-family: 'Space Mono', monospace;
            font-weight: 400;
            -webkit-text-fill-color: rgba(255,255,255,0.15);
            display: block;
            margin-top: 10px;
        }

        .subtitle {
            font-size: 14px;
            color: rgba(255,255,255,0.4);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-family: 'Space Mono', monospace;
            margin-top: 12px;
        }

        /* MAIN CONTENT GRID */
        .main-grid {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 0;
            flex: 1;
            max-width: 1600px;
            width: 100%;
            margin: 0 auto;
            padding: 0 30px 60px;
        }

        /* PREVIEW PANEL */
        .preview-panel {
            padding: 30px 40px 30px 0;
        }

        .preview-label {
            font-family: 'Space Mono', monospace;
            font-size: 10px;
            letter-spacing: 4px;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-label::before {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.08);
        }

        .preview-frame {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
        }

        .preview-frame::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, var(--r), var(--o), var(--y), var(--g), var(--b), var(--v));
            border-radius: 22px;
            z-index: -1;
            animation: borderSpin 4s linear infinite;
            background-size: 300% 300%;
        }

        @keyframes borderSpin {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        #preview-img {
            width: 100%;
            display: block;
            border-radius: 18px;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .preview-loading {
            position: absolute;
            inset: 0;
            background: rgba(5,5,8,0.8);
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.5);
        }

        .action-row {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            padding: 14px 24px;
            border-radius: 12px;
            border: none;
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--r), var(--o), var(--y), var(--g), var(--b), var(--v));
            background-size: 200% 200%;
            color: #000;
            font-weight: 700;
            animation: gradientShift 4s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .btn-main:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 40px rgba(255, 100, 200, 0.4);
        }

        .btn-secondary {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.7);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        /* PRIDE BANNER SECTION */
        .pride-banner-section {
            margin-top: 30px;
            padding: 28px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .pride-banner-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--r), var(--o), var(--y), var(--g), var(--b), var(--v));
        }

        .pride-flag-display {
            display: flex;
            height: 70px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 18px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.05);
        }

        .flag-stripe {
            flex: 1;
            transition: flex 0.3s ease;
        }

        .flag-stripe:hover { flex: 2; }

        .pride-quote {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 18px;
            line-height: 1.5;
            color: rgba(255,255,255,0.8);
            border-left: 3px solid;
            border-image: linear-gradient(to bottom, var(--r), var(--v)) 1;
            padding-left: 18px;
            margin-bottom: 14px;
        }

        .pride-tagline {
            font-size: 12px;
            color: rgba(255,255,255,0.35);
            letter-spacing: 2px;
            font-family: 'Space Mono', monospace;
            text-transform: uppercase;
        }

        /* SIDEBAR STYLES */
        .styles-panel {
            border-left: 1px solid rgba(255,255,255,0.06);
            padding: 30px 0 30px 30px;
            display: flex;
            flex-direction: column;
        }

        .panel-header {
            margin-bottom: 24px;
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .panel-subtitle {
            font-size: 11px;
            color: rgba(255,255,255,0.3);
            font-family: 'Space Mono', monospace;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .styles-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            flex: 1;
        }

        .styles-list::-webkit-scrollbar { width: 3px; }
        .styles-list::-webkit-scrollbar-track { background: transparent; }
        .styles-list::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

        .style-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .style-card::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: transparent;
            transition: background 0.3s ease;
        }

        .style-card:hover::before,
        .style-card.active::before {
            background: linear-gradient(to bottom, var(--r), var(--v));
        }

        .style-card:hover, .style-card.active {
            background: rgba(255,255,255,0.07);
            border-color: rgba(255,255,255,0.15);
            transform: translateX(4px);
        }

        .style-card.active {
            box-shadow: 0 0 20px rgba(255,100,200,0.15);
        }

        .style-num {
            font-family: 'Space Mono', monospace;
            font-size: 10px;
            color: rgba(255,255,255,0.25);
            min-width: 20px;
        }

        .style-swatch {
            width: 36px; height: 36px;
            border-radius: 50%;
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        .style-info { flex: 1; }

        .style-name {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .style-desc {
            font-size: 11px;
            color: rgba(255,255,255,0.35);
        }

        .style-arrow {
            color: rgba(255,255,255,0.2);
            font-size: 16px;
            transition: all 0.3s;
        }

        .style-card:hover .style-arrow,
        .style-card.active .style-arrow {
            color: rgba(255,255,255,0.7);
            transform: translateX(4px);
        }

        /* URL INPUT */
        .url-section {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .input-label {
            font-size: 10px;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.3);
            font-family: 'Space Mono', monospace;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        .url-input {
            flex: 1;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 12px 16px;
            color: white;
            font-family: 'Space Mono', monospace;
            font-size: 11px;
            outline: none;
            transition: border-color 0.3s;
        }

        .url-input:focus {
            border-color: rgba(255,100,200,0.5);
        }

        .url-input::placeholder {
            color: rgba(255,255,255,0.2);
        }

        .btn-load {
            padding: 12px 18px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-load:hover {
            background: linear-gradient(135deg, var(--r), var(--v));
            border-color: transparent;
        }

        /* FOOTER */
        .pride-footer {
            position: relative;
            z-index: 10;
            padding: 0 30px 30px;
            max-width: 1600px;
            width: 100%;
            margin: 0 auto;
        }

        .footer-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 30px;
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            background: linear-gradient(90deg, var(--r), var(--o), var(--y), var(--g), var(--b), var(--v));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-quote {
            font-size: 13px;
            color: rgba(255,255,255,0.3);
            font-style: italic;
        }

        .footer-tech {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .tech-pill {
            padding: 4px 12px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 100px;
            font-family: 'Space Mono', monospace;
            font-size: 10px;
            color: rgba(255,255,255,0.4);
            letter-spacing: 1px;
        }

        /* TOAST NOTIFICATION */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: linear-gradient(135deg, rgba(20,20,30,0.95), rgba(10,10,20,0.95));
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 14px;
            padding: 16px 28px;
            font-family: 'Space Mono', monospace;
            font-size: 12px;
            letter-spacing: 2px;
            color: white;
            z-index: 9999;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            backdrop-filter: blur(20px);
            white-space: nowrap;
        }

        .toast.show {
            transform: translateX(-50%) translateY(0);
        }

        .toast-inner {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toast-icon {
            font-size: 20px;
        }

        /* SCROLL REVEAL */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            animation: revealUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }

        @keyframes revealUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Scrollbar global */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 10px; }

        /* PRIDE HEARTS ANIMADOS */
        .floating-hearts {
            position: fixed;
            pointer-events: none;
            z-index: 9997;
        }

        @media (max-width: 900px) {
            .main-grid { grid-template-columns: 1fr; padding: 0 16px 40px; }
            .styles-panel { border-left: none; border-top: 1px solid rgba(255,255,255,0.06); padding: 30px 0 0; }
            .preview-panel { padding: 20px 0; }
            .action-row { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

<!-- CUSTOM CURSOR -->
<div class="cursor" id="cursor"></div>
<div class="cursor-trail" id="cursorTrail"></div>

<!-- TOAST -->
<div class="toast" id="toast">
    <div class="toast-inner">
        <span class="toast-icon">🏳️‍🌈</span>
        <span id="toast-msg">URL COPIADA CON AMOR Y ORGULLO</span>
    </div>
</div>

<!-- BACKGROUND -->
<div class="bg-canvas" id="bgCanvas">
    <div class="pride-stripe"></div>
    <div class="pride-stripe"></div>
    <div class="pride-stripe"></div>
    <div class="pride-stripe"></div>
    <div class="pride-stripe"></div>
    <div class="pride-stripe"></div>
    <div id="particleContainer"></div>
</div>

<div class="page-wrapper">

    <!-- HERO HEADER -->
    <header class="hero-header reveal">
        <div class="badge-pride">🏳️‍🌈 &nbsp; PRIDE EDITION &nbsp; • &nbsp; ULTRA LUXE &nbsp; • &nbsp; 2026</div>
        <h1 class="main-title">
            <span class="title-pride">DEYLIN</span>
            <span class="title-systems">PRIDE &nbsp; SYSTEMS &nbsp; ENGINE &nbsp; V4.0</span>
        </h1>
        <p class="subtitle">♥ &nbsp; Love is Love &nbsp; • &nbsp; Banner Generation Lab &nbsp; • &nbsp; Premium ♥</p>
    </header>

    <!-- MAIN GRID -->
    <div class="main-grid">

        <!-- PREVIEW PANEL -->
        <div class="preview-panel reveal" style="animation-delay: 0.2s;">
            <div class="preview-label">LIVE PREVIEW</div>

            <div class="preview-frame" id="previewFrame">
                <img id="preview-img"
                     src="?logo=<?= urlencode($img_predeterminada) ?>&estilo=1"
                     alt="Banner Preview">
                <div class="preview-loading" id="loadingOverlay">
                    <span>⟳ &nbsp; GENERANDO CON AMOR...</span>
                </div>
            </div>

            <div class="action-row">
                <button class="btn btn-main" onclick="copyEndpoint()">
                    🔗 &nbsp; COPIAR API URL
                </button>
                <button class="btn btn-secondary" onclick="openRaw()" title="Ver imagen directa">
                    ↗ RAW
                </button>
                <button class="btn btn-secondary" onclick="downloadImg()" title="Descargar">
                    ↓ DL
                </button>
            </div>

            <!-- PRIDE FLAG + QUOTE SECTION -->
            <div class="pride-banner-section" style="margin-top:20px;">
                <div class="pride-flag-display">
                    <div class="flag-stripe" style="background:#FF0018;"></div>
                    <div class="flag-stripe" style="background:#FF8C00;"></div>
                    <div class="flag-stripe" style="background:#FFED00;"></div>
                    <div class="flag-stripe" style="background:#008026;"></div>
                    <div class="flag-stripe" style="background:#004DFF;"></div>
                    <div class="flag-stripe" style="background:#750787;"></div>
                </div>
                <div class="pride-quote" id="prideQuote">
                    "No tienes que ser una persona diferente para ser amada. Eres perfecto tal como eres."
                </div>
                <div class="pride-tagline" id="prideStat">
                    ♥ &nbsp; PRIDE · LOVE · IDENTITY · FREEDOM · EQUALITY &nbsp; ♥
                </div>
            </div>
        </div>

        <!-- STYLES SIDEBAR -->
        <div class="styles-panel reveal" style="animation-delay: 0.4s;">
            <div class="panel-header">
                <h2 class="panel-title">Pride<br>Styles</h2>
                <p class="panel-subtitle">10 presets de élite</p>
            </div>

            <div class="styles-list" id="stylesList">
                <?php
                $swatches = [
                    1  => 'linear-gradient(135deg, #FF0018, #86007D)',
                    2  => 'linear-gradient(135deg, #D60270, #9B4F96, #0038A8)',
                    3  => 'linear-gradient(135deg, #FF0018, #FFA52C, #FFFF41, #008018, #0000F9)',
                    4  => 'linear-gradient(135deg, #55CDFC, #F7A8B8, #FFFFFF, #F7A8B8, #55CDFC)',
                    5  => 'linear-gradient(135deg, #00ff41, #ff00ff, #00aaff)',
                    6  => 'linear-gradient(135deg, #D62900, #FF9B55, #FFFFFF, #D461A6, #A50062)',
                    7  => 'linear-gradient(135deg, #2D0037, #5C0087, #000000)',
                    8  => 'linear-gradient(135deg, #FF85E5, #FFB3F3, #E085FF, #C2A6FF)',
                    9  => 'linear-gradient(135deg, #000000, #a4a4a4, #FFFFFF, #810081, #004DFF)',
                    10 => 'linear-gradient(135deg, #FFDA00, #FFB100, #FF6600)',
                ];
                foreach ($presets_meta as $id => $meta):
                ?>
                <div class="style-card <?= $id===1?'active':'' ?>"
                     onclick="changeStyle(<?= $id ?>)"
                     id="card-<?= $id ?>">
                    <span class="style-num"><?= str_pad($id, 2, '0', STR_PAD_LEFT) ?></span>
                    <div class="style-swatch" style="background: <?= $swatches[$id] ?>;"></div>
                    <div class="style-info">
                        <div class="style-name"><?= $meta['label'] ?></div>
                        <div class="style-desc"><?= $meta['desc'] ?></div>
                    </div>
                    <span class="style-arrow">›</span>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- URL INPUT -->
            <div class="url-section">
                <div class="input-label">Tu URL de Logo</div>
                <div class="input-group">
                    <input type="text"
                           class="url-input"
                           id="logoUrl"
                           placeholder="https://tu-logo.com/imagen.png"
                           value="<?= htmlspecialchars($img_predeterminada) ?>">
                    <button class="btn-load" onclick="loadCustomLogo()" title="Cargar">🎨</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="pride-footer reveal" style="animation-delay: 0.6s;">
        <div class="footer-bar">
            <div class="footer-brand">DEYLIN SYSTEMS</div>
            <div class="footer-quote">❝ Programado con orgullo y amor ❞</div>
            <div class="footer-tech">
                <span class="tech-pill">PHP 8.5</span>
                <span class="tech-pill">GD ENGINE</span>
                <span class="tech-pill" style="color: #4ade80; border-color: rgba(74,222,128,0.3);">● ONLINE</span>
            </div>
        </div>
    </footer>

</div>

<script>
    // === CURSOR ===
    const cursor = document.getElementById('cursor');
    const trail = document.getElementById('cursorTrail');
    let trailX = 0, trailY = 0;
    document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });
    setInterval(() => {
        trail.style.left = trailX + 'px';
        trail.style.top = trailY + 'px';
    }, 50);
    document.addEventListener('mousemove', e => { trailX = e.clientX; trailY = e.clientY; });

    // === PARTÍCULAS ===
    const colors = ['#FF0018','#FFA52C','#FFFF41','#008018','#0000F9','#86007D','#FF85E5','#55CDFC'];
    const container = document.getElementById('particleContainer');
    for (let i = 0; i < 40; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 8 + 2;
        const color = colors[Math.floor(Math.random() * colors.length)];
        p.style.cssText = `
            width: ${size}px; height: ${size}px;
            background: ${color};
            left: ${Math.random() * 100}%;
            animation-duration: ${Math.random() * 15 + 10}s;
            animation-delay: ${Math.random() * 10}s;
            opacity: 0;
        `;
        container.appendChild(p);
    }

    // === CORAZONES AL CLICK ===
    document.addEventListener('click', e => {
        for (let i = 0; i < 6; i++) {
            const heart = document.createElement('div');
            heart.innerHTML = ['❤️','🧡','💛','💚','💙','💜','🤍','🖤'][Math.floor(Math.random() * 8)];
            heart.style.cssText = `
                position: fixed;
                left: ${e.clientX}px;
                top: ${e.clientY}px;
                pointer-events: none;
                font-size: ${Math.random() * 20 + 10}px;
                z-index: 9999;
                animation: heartFloat 1.5s ease forwards;
                transform: translate(-50%, -50%);
            `;
            document.body.appendChild(heart);
            setTimeout(() => heart.remove(), 1500);
        }
    });

    // Inject heart animation
    const heartStyle = document.createElement('style');
    heartStyle.textContent = `
        @keyframes heartFloat {
            0% { transform: translate(-50%,-50%) scale(0) rotate(${Math.random()*60-30}deg); opacity: 1; }
            100% { transform: translate(${Math.random()*100-50}px, -100px) scale(1.5) rotate(${Math.random()*60-30}deg); opacity: 0; }
        }
    `;
    document.head.appendChild(heartStyle);

    // === STATE ===
    let currentStyle = 1;
    let currentLogo = document.getElementById('logoUrl').value;

    // === PRIDE QUOTES ===
    const quotes = [
        '"No tienes que ser una persona diferente para ser amada. Eres perfecto tal como eres."',
        '"El orgullo no es solo un mes. Es una vida entera de ser auténticamente tú."',
        '"Amor es amor. Punto final. Sin excepciones. Sin condiciones."',
        '"Sé quien hubieras querido conocer cuando eras pequeño."',
        '"Tu identidad no es una fase. Es quien realmente eres."',
        '"La libertad significa el derecho de ser quien eres, no quien te dicen que seas."',
        '"Somos todos estrellas del arcoíris brillando en el mismo cielo."',
        '"El mundo es más hermoso cuando todos podemos ser nosotros mismos."',
    ];
    let quoteIndex = 0;
    setInterval(() => {
        quoteIndex = (quoteIndex + 1) % quotes.length;
        const el = document.getElementById('prideQuote');
        el.style.opacity = '0';
        el.style.transform = 'translateX(-10px)';
        el.style.transition = 'all 0.4s ease';
        setTimeout(() => {
            el.textContent = quotes[quoteIndex];
            el.style.opacity = '1';
            el.style.transform = 'translateX(0)';
        }, 400);
    }, 5000);

    // === CHANGE STYLE ===
    function changeStyle(id) {
        currentStyle = id;
        document.querySelectorAll('.style-card').forEach(c => c.classList.remove('active'));
        document.getElementById('card-' + id).classList.add('active');

        const img = document.getElementById('preview-img');
        const loading = document.getElementById('loadingOverlay');
        loading.style.display = 'flex';
        img.style.opacity = '0.3';
        img.style.transform = 'scale(0.98)';
        img.style.transition = 'all 0.3s ease';

        const newSrc = `?logo=${encodeURIComponent(currentLogo)}&estilo=${id}`;
        const tempImg = new Image();
        tempImg.onload = () => {
            img.src = newSrc;
            loading.style.display = 'none';
            img.style.opacity = '1';
            img.style.transform = 'scale(1)';
        };
        tempImg.onerror = () => {
            loading.style.display = 'none';
            img.style.opacity = '1';
        };
        tempImg.src = newSrc;
    }

    // === LOAD CUSTOM LOGO ===
    function loadCustomLogo() {
        const urlInput = document.getElementById('logoUrl');
        const val = urlInput.value.trim();
        if (!val) return;
        currentLogo = val;
        changeStyle(currentStyle);
    }

    // === COPY URL ===
    function copyEndpoint() {
        const url = `${window.location.href.split('?')[0]}?logo=${encodeURIComponent(currentLogo)}&estilo=${currentStyle}`;
        navigator.clipboard.writeText(url).then(() => {
            showToast('🏳️‍🌈', '¡URL COPIADA CON AMOR Y ORGULLO!');
        });
    }

    function openRaw() {
        window.open(`?logo=${encodeURIComponent(currentLogo)}&estilo=${currentStyle}`);
    }

    function downloadImg() {
        const link = document.createElement('a');
        link.href = `?logo=${encodeURIComponent(currentLogo)}&estilo=${currentStyle}`;
        link.download = `deylin_pride_banner_style${currentStyle}.png`;
        link.click();
    }

    // === TOAST ===
    function showToast(icon, msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        toast.querySelector('.toast-icon').textContent = icon;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    // Enter en URL input
    document.getElementById('logoUrl').addEventListener('keydown', e => {
        if (e.key === 'Enter') loadCustomLogo();
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', e => {
        if (e.key >= '1' && e.key <= '9') changeStyle(parseInt(e.key));
        if (e.key === '0') changeStyle(10);
    });

    // Tooltip de atajos
    setTimeout(() => showToast('⌨️', 'TRUCO: USA TECLAS 1-0 PARA CAMBIAR ESTILOS'), 3000);
</script>
</body>
</html>
    <?php
    exit;
}

// ====================================================
// ===== ENGINE DE IMAGEN PRIDE ULTRA-PREMIUM ==========
// ====================================================

$w = 1200; $h = 600;
$canvas = imagecreatetruecolor($w, $h);
imagealphablending($canvas, true);
imagesavealpha($canvas, true);

// PALETA PRIDE
$PRIDE = [
    'red'    => [255, 0, 24],
    'orange' => [255, 165, 44],
    'yellow' => [255, 237, 0],
    'green'  => [0, 128, 38],
    'blue'   => [0, 77, 255],
    'violet' => [117, 7, 135],
    'trans_blue' => [85, 205, 252],
    'trans_pink' => [247, 168, 184],
    'white'  => [255, 255, 255],
    'black'  => [0, 0, 0],
    'bi_pink' => [214, 2, 112],
    'bi_purple' => [155, 79, 150],
    'bi_blue' => [0, 56, 168],
];

// PRESETS PRIDE
$presets = [
    1 => [ // PRIDE WAVE - Ondas arcoíris
        'mode' => 'pride_wave',
        'bg'   => [8, 5, 20],
        'stripes' => ['red','orange','yellow','green','blue','violet'],
        'accent' => [255, 50, 200],
        'text_col' => [255, 255, 255],
        'text_shadow' => [255, 0, 100],
        'label' => 'PRIDE WAVE',
    ],
    2 => [ // BISEXUAL NEON
        'mode' => 'bi_neon',
        'bg'   => [10, 5, 30],
        'stripes' => ['bi_pink','bi_pink','bi_purple','bi_blue','bi_blue'],
        'accent' => [214, 2, 112],
        'text_col' => [255, 220, 255],
        'text_shadow' => [214, 2, 112],
        'label' => 'BISEXUAL NEON',
    ],
    3 => [ // RAINBOW FIRE
        'mode' => 'rainbow_fire',
        'bg'   => [5, 0, 0],
        'stripes' => ['violet','blue','green','yellow','orange','red'],
        'accent' => [255, 100, 0],
        'text_col' => [255, 255, 200],
        'text_shadow' => [255, 80, 0],
        'label' => 'RAINBOW FIRE',
    ],
    4 => [ // TRANS CIELO
        'mode' => 'trans_sky',
        'bg'   => [200, 230, 255],
        'stripes' => ['trans_blue','trans_blue','trans_pink','trans_pink','white','white','trans_pink','trans_pink','trans_blue','trans_blue'],
        'accent' => [85, 205, 252],
        'text_col' => [30, 30, 80],
        'text_shadow' => [85, 205, 252],
        'label' => 'TRANS CIELO',
    ],
    5 => [ // QUEER VOLTAJE
        'mode' => 'queer_volt',
        'bg'   => [0, 5, 0],
        'stripes' => ['green','blue','violet','bi_pink','orange'],
        'accent' => [0, 255, 65],
        'text_col' => [200, 255, 200],
        'text_shadow' => [0, 255, 65],
        'label' => 'QUEER VOLTAJE',
    ],
    6 => [ // LESBIAN SUNSET
        'mode' => 'lesbian_sun',
        'bg'   => [30, 5, 15],
        'stripes' => ['red','orange','yellow','orange','red'], // tipo sunset lesbiana naranja-rosa
        'accent' => [214, 41, 0],
        'text_col' => [255, 220, 180],
        'text_shadow' => [214, 41, 0],
        'label' => 'LESBIAN SUNSET',
    ],
    7 => [ // DARK PRIDE
        'mode' => 'dark_pride',
        'bg'   => [5, 5, 5],
        'stripes' => ['violet','blue','green','yellow','orange','red'],
        'accent' => [168, 50, 200],
        'text_col' => [255, 255, 255],
        'text_shadow' => [100, 0, 150],
        'label' => 'DARK PRIDE',
    ],
    8 => [ // GLITTER QUEEN
        'mode' => 'glitter_queen',
        'bg'   => [25, 5, 35],
        'stripes' => ['violet','bi_pink','trans_pink','white','trans_pink','bi_pink','violet'],
        'accent' => [255, 100, 255],
        'text_col' => [255, 220, 255],
        'text_shadow' => [255, 50, 255],
        'label' => 'GLITTER QUEEN',
    ],
    9 => [ // PROGRESS FLAG
        'mode' => 'progress',
        'bg'   => [10, 10, 10],
        'stripes' => ['red','orange','yellow','green','blue','violet'],
        'accent' => [255, 255, 255],
        'text_col' => [255, 255, 255],
        'text_shadow' => [85, 205, 252],
        'label' => 'PROGRESS FLAG',
    ],
    10 => [ // ROYAL PRIDE
        'mode' => 'royal_pride',
        'bg'   => [10, 5, 25],
        'stripes' => ['violet','blue','green','yellow','orange','red'],
        'accent' => [220, 190, 0],
        'text_col' => [255, 240, 180],
        'text_shadow' => [220, 180, 0],
        'label' => 'ROYAL PRIDE',
    ],
];

$cfg = $presets[$estilo] ?? $presets[1];

// ---- FUNCIÓN HELPER COLORES ----
function col($c, $img, $stripes, $PRIDE, $alpha = -1) {
    $rgb = is_string($c) ? ($PRIDE[$c] ?? [255,255,255]) : $c;
    if ($alpha >= 0)
        return imagecolorallocatealpha($img, $rgb[0], $rgb[1], $rgb[2], $alpha);
    return imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
}

// ---- FONDO BASE ----
$bg_color = imagecolorallocate($canvas, $cfg['bg'][0], $cfg['bg'][1], $cfg['bg'][2]);
imagefill($canvas, 0, 0, $bg_color);

// ---- PRIDE STRIPES DIAGONALES DE FONDO ----
$numStripes = count($cfg['stripes']);
$stripeW = (int)($w / $numStripes);

// Primero, dibujar las franjas de la bandera como fondo semi-transparente diagonal
for ($si = 0; $si < $numStripes; $si++) {
    $rgb = is_string($cfg['stripes'][$si]) ? ($PRIDE[$cfg['stripes'][$si]] ?? [255,255,255]) : $cfg['stripes'][$si];
    $sc = imagecolorallocatealpha($canvas, $rgb[0], $rgb[1], $rgb[2], 90);
    $x1 = $si * $stripeW;
    $x2 = ($si + 1) * $stripeW;
    // Franja diagonal
    $points = [$x1, 0, $x2, 0, $x2 + 80, $h, $x1 + 80, $h];
    imagefilledpolygon($canvas, $points, $sc);
}

// ---- FRANJA PRIDE INFERIOR SÓLIDA (bandera real) ----
$flagH = 110;
$flagY = $h - $flagH;
for ($si = 0; $si < $numStripes; $si++) {
    $rgb = is_string($cfg['stripes'][$si]) ? ($PRIDE[$cfg['stripes'][$si]] ?? [255,255,255]) : $cfg['stripes'][$si];
    $sc = imagecolorallocate($canvas, $rgb[0], $rgb[1], $rgb[2]);
    $x1 = (int)($si * $w / $numStripes);
    $x2 = (int)(($si + 1) * $w / $numStripes);
    imagefilledrectangle($canvas, $x1, $flagY, $x2, $h, $sc);
}
// Overlay oscuro sobre bandera inferior
$flagOverlay = imagecolorallocatealpha($canvas, $cfg['bg'][0], $cfg['bg'][1], $cfg['bg'][2], 50);
imagefilledrectangle($canvas, 0, $flagY, $w, $h, $flagOverlay);

// ---- FRANJA PRIDE SUPERIOR SÓLIDA ----
$topFlagH = 18;
for ($si = 0; $si < $numStripes; $si++) {
    $rgb = is_string($cfg['stripes'][$si]) ? ($PRIDE[$cfg['stripes'][$si]] ?? [255,255,255]) : $cfg['stripes'][$si];
    $sc = imagecolorallocate($canvas, $rgb[0], $rgb[1], $rgb[2]);
    $x1 = (int)($si * $w / $numStripes);
    $x2 = (int)(($si + 1) * $w / $numStripes);
    imagefilledrectangle($canvas, $x1, 0, $x2, $topFlagH, $sc);
}

// ---- GLOW CENTRAL ----
$gc_r = $cfg['accent'][0]; $gc_g = $cfg['accent'][1]; $gc_b = $cfg['accent'][2];
for ($r = 280; $r >= 10; $r -= 12) {
    $al = (int)(127 - ($r / 280) * 127);
    $al = min(127, $al + 100);
    $gc = imagecolorallocatealpha($canvas, $gc_r, $gc_g, $gc_b, $al);
    imagefilledellipse($canvas, $w/2, $h/2, $r, $r, $gc);
}

// ---- PARTÍCULAS FLOTANTES ----
$prideColsKeys = ['red','orange','yellow','green','blue','violet','trans_blue','trans_pink'];
for ($i = 0; $i < 80; $i++) {
    $pk = $prideColsKeys[array_rand($prideColsKeys)];
    $pr = $PRIDE[$pk];
    $pc = imagecolorallocatealpha($canvas, $pr[0], $pr[1], $pr[2], rand(60, 110));
    $ps = rand(1, 5);
    imagefilledellipse($canvas, rand(0, $w), rand(0, $h), $ps, $ps, $pc);
}

// ---- LINEAS DECORATIVAS DIAGONALES ----
for ($li = 0; $li < 6; $li++) {
    $lk = $prideColsKeys[$li % count($prideColsKeys)];
    $lr = $PRIDE[$lk];
    $lc = imagecolorallocatealpha($canvas, $lr[0], $lr[1], $lr[2], 105);
    $lx = $li * 220;
    imageline($canvas, $lx, 0, $lx - 150, $h, $lc);
}

// ---- BORDE PRIDE ARCOÍRIS ----
$bT = 12;
for ($b = 0; $b < $bT; $b++) {
    $bi = (int)(($b / $bT) * $numStripes);
    $rgb = is_string($cfg['stripes'][$bi % $numStripes]) ? ($PRIDE[$cfg['stripes'][$bi % $numStripes]] ?? [255,255,255]) : $cfg['stripes'][$bi % $numStripes];
    $alpha_border = max(0, 90 - $b * 7);
    $bc = imagecolorallocatealpha($canvas, $rgb[0], $rgb[1], $rgb[2], $alpha_border);
    imagerectangle($canvas, $b, $b, $w - $b - 1, $h - $b - 1, $bc);
}

// ---- LOGO: DESCARGAR Y COLOCAR ----
$ch = curl_init($url_logo);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_USERAGENT => 'Mozilla/5.0',
    CURLOPT_TIMEOUT => 10,
    CURLOPT_FOLLOWLOCATION => true,
]);
$raw = curl_exec($ch);
curl_close($ch);

$logo_size = 420;
$logo_x = ($w - $logo_size) / 2;
$logo_y = ($h - $logo_size) / 2 - 20;

if ($raw) {
    $logo_img = @imagecreatefromstring($raw);
    if ($logo_img) {
        $lw = imagesx($logo_img);
        $lh = imagesy($logo_img);

        // Sombra del logo: varios círculos concéntricos con colores pride
        $shadowColors = ['violet', 'blue', 'green', 'yellow', 'orange', 'red'];
        foreach ($shadowColors as $si2 => $sk) {
            $sr = $PRIDE[$sk];
            $sar = imagecolorallocatealpha($canvas, $sr[0], $sr[1], $sr[2], 110 + $si2 * 2);
            $shadowSize = $logo_size + 30 + $si2 * 8;
            imagefilledellipse($canvas, $w/2, $h/2 - 20, $shadowSize, $shadowSize, $sar);
        }

        // Sombra oscura
        $shd = imagecolorallocatealpha($canvas, 0, 0, 0, 40);
        imagefilledellipse($canvas, $w/2 + 8, $h/2 - 12, $logo_size + 20, $logo_size + 20, $shd);

        // Colocar logo (cuadrado centrado)
        imagecopyresampled($canvas, $logo_img, (int)$logo_x, (int)$logo_y, 0, 0, $logo_size, $logo_size, $lw, $lh);

        // Anillos arcoíris alrededor del logo
        for ($ri = 0; $ri < 6; $ri++) {
            $rrgb = $PRIDE[$prideColsKeys[$ri]];
            $ral = 80 + $ri * 6;
            $rc = imagecolorallocatealpha($canvas, $rrgb[0], $rrgb[1], $rrgb[2], $ral);
            $rs = $logo_size + 20 + $ri * 14;
            imageellipse($canvas, $w/2, $h/2 - 20, $rs, $rs, $rc);
            $rs2 = $logo_size + 22 + $ri * 14;
            imageellipse($canvas, $w/2, $h/2 - 20, $rs2, $rs2, $rc);
        }

        imagedestroy($logo_img);
    }
}

// ---- TEXTO PRIDE LABEL ----
// Caja de texto en la franja inferior
$boxY = $flagY + 8;
$boxH = $flagH - 16;
$boxX = 80;
$boxW = $w - 160;

// Fondo de la caja de texto semi-transparente
$boxBg = imagecolorallocatealpha($canvas, $cfg['bg'][0], $cfg['bg'][1], $cfg['bg'][2], 40);
imagefilledrectangle($canvas, $boxX, $boxY, $boxX + $boxW, $boxY + $boxH, $boxBg);

// Borde arcoíris de la caja
for ($bri = 0; $bri < $numStripes; $bri++) {
    $brrgb = is_string($cfg['stripes'][$bri]) ? ($PRIDE[$cfg['stripes'][$bri]] ?? [255,255,255]) : $cfg['stripes'][$bri];
    $brc = imagecolorallocate($canvas, $brrgb[0], $brrgb[1], $brrgb[2]);
    $segW = (int)($boxW / $numStripes);
    $segX = $boxX + $bri * $segW;
    imageline($canvas, $segX, $boxY, $segX + $segW, $boxY, $brc);
    imageline($canvas, $segX, $boxY + $boxH, $segX + $segW, $boxY + $boxH, $brc);
}

// Texto principal "DEYLIN PRIDE SYSTEMS"
$mainText = "DEYLIN PRIDE SYSTEMS";
$textColor = imagecolorallocate($canvas, $cfg['text_col'][0], $cfg['text_col'][1], $cfg['text_col'][2]);
$textShadow = imagecolorallocate($canvas, $cfg['text_shadow'][0], $cfg['text_shadow'][1], $cfg['text_shadow'][2]);

// Calcular centrado del texto
$font = 5; // fuente GD más grande
$charW = 9; // ancho aprox por char con font 5
$textLen = strlen($mainText) * $charW;
$tx = (int)(($w - $textLen) / 2);
$ty = $boxY + 15;

// Sombra del texto (desplazada)
imagestring($canvas, $font, $tx + 2, $ty + 2, $mainText, $textShadow);
imagestring($canvas, $font, $tx, $ty, $mainText, $textColor);

// Sub-texto con el label del estilo
$subText = "♥  " . $cfg['label'] . "  ♥  LOVE IS LOVE  ♥  PRIDE 2026  ♥";
$subLen = strlen($subText) * 7; // font 4: ~7px/char
$sx = (int)(($w - $subLen) / 2);
$sy = $ty + 28;
$subCol = imagecolorallocatealpha($canvas, $cfg['text_col'][0], $cfg['text_col'][1], $cfg['text_col'][2], 30);
imagestring($canvas, 4, $sx, $sy, $subText, $subCol);

// ---- DECORACIÓN: PEQUEÑAS ESTRELLAS/DESTELLOS ----
for ($star = 0; $star < 30; $star++) {
    $sk = $prideColsKeys[array_rand($prideColsKeys)];
    $sr = $PRIDE[$sk];
    $sc2 = imagecolorallocatealpha($canvas, $sr[0], $sr[1], $sr[2], rand(50, 100));
    $sx2 = rand(20, $w - 20);
    $sy2 = rand(20, $flagY - 20);
    $ss = rand(1, 3);
    imagefilledellipse($canvas, $sx2, $sy2, $ss, $ss, $sc2);
    // Cruz pequeña (destello)
    imageline($canvas, $sx2 - $ss*2, $sy2, $sx2 + $ss*2, $sy2, $sc2);
    imageline($canvas, $sx2, $sy2 - $ss*2, $sx2, $sy2 + $ss*2, $sc2);
}

// ---- OUTPUT ----
header('Content-Type: image/png');
header('Cache-Control: public, max-age=3600');
imagepng($canvas, null, 6);
imagedestroy($canvas);
?>
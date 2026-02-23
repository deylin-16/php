<?php
error_reporting(0);
ini_set('display_errors', 0);

// ============================================================
//  DEYLIN SYSTEMS — BANNER LAB ULTRA V5.0
//  Features: 20 estilos, efectos avanzados, texto personalizado,
//  degradados multicapa, overlays, formas geométricas, glitch,
//  scanlines, noise, etc.
// ============================================================

$url_logo  = $_GET['logo']      ?? '';
$estilo    = (int)($_GET['estilo']   ?? 1);
$texto1    = urldecode($_GET['t1']   ?? 'DEYLIN SYSTEMS');
$texto2    = urldecode($_GET['t2']   ?? 'PREMIUM BANNER LAB');
$sub       = urldecode($_GET['sub']  ?? 'ENGINE V5.0');
$width     = min(2400, max(400, (int)($_GET['w']  ?? 1200)));
$height    = min(1200, max(200, (int)($_GET['h']  ?? 600)));
$radius    = min(300, max(50, (int)($_GET['r']   ?? 200)));
$avatar_x  = min(90,  max(10, (int)($_GET['ax']  ?? 15)));
$avatar_y  = min(90,  max(10, (int)($_GET['ay']  ?? 50)));
// Tamaños de fuente en px (mismos que el canvas JS)
$fs1       = min(200, max(8, (int)($_GET['fs1'] ?? 72)));   // fuente t1 (px)
$fs2       = min(100, max(8, (int)($_GET['fs2'] ?? 32)));   // fuente t2 (px)
$fs3       = min(60,  max(8, (int)($_GET['fs3'] ?? 18)));   // fuente sub (px)
$show_particles = ($_GET['particles'] ?? '1') !== '0';
$show_lines     = ($_GET['lines']     ?? '1') !== '0';
$show_glitch    = ($_GET['glitch']    ?? '0') === '1';
$show_scanlines = ($_GET['scanlines'] ?? '0') === '1';
$show_noise     = ($_GET['noise']     ?? '1') !== '0';
$show_grid      = ($_GET['grid']      ?? '0') === '1';
$badge_text     = urldecode($_GET['badge'] ?? '');
$watermark      = urldecode($_GET['wm']    ?? 'deylin.systems');
$output_format  = strtolower($_GET['fmt']  ?? 'png');
$quality        = min(100, max(10, (int)($_GET['q'] ?? 90)));

$img_predeterminada = "https://ik.imagekit.io/pm10ywrf6f/bot_by_deylin/1769830823123_e336030d2dfd15b3f2a9bec8d30e15f3_YZEsD9KKM.jpg";

// ============================================================
// DASHBOARD — solo cuando no hay logo en la URL
// ============================================================
if (empty($url_logo)) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DEYLIN SYSTEMS · BANNER LAB ULTRA V5</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Bebas+Neue&family=DM+Sans:wght@300;400;600&family=Anton&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --c-bg:    #050508;
    --c-panel: rgba(255,255,255,0.03);
    --c-border:rgba(255,255,255,0.08);
    --c-acc:   #7c3aed;
    --c-acc2:  #06d6a0;
    --c-acc3:  #f72585;
    --font-mono: 'Share Tech Mono', monospace;
    --font-display: 'Bebas Neue', cursive;
    --font-body: 'DM Sans', sans-serif;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    background: var(--c-bg);
    color: #c8c8d8;
    font-family: var(--font-body);
    min-height: 100vh;
    overflow-x: hidden;
  }
  /* Animated background grid */
  body::before {
    content:'';
    position:fixed; inset:0; z-index:0; pointer-events:none;
    background-image:
      linear-gradient(rgba(124,58,237,.06) 1px, transparent 1px),
      linear-gradient(90deg, rgba(124,58,237,.06) 1px, transparent 1px);
    background-size: 40px 40px;
    animation: gridScroll 20s linear infinite;
  }
  @keyframes gridScroll { to { background-position: 0 40px; } }

  /* Orb glow */
  .orb {
    position:fixed; border-radius:50%; filter:blur(120px); opacity:.25; pointer-events:none; z-index:0;
  }
  .orb-1 { width:600px;height:600px; background:#7c3aed; top:-200px; left:-100px; }
  .orb-2 { width:500px;height:500px; background:#f72585; bottom:-150px; right:-100px; }
  .orb-3 { width:400px;height:400px; background:#06d6a0; top:40%; left:50%; }

  .wrap { position:relative; z-index:1; max-width:1400px; margin:0 auto; padding:24px; }

  /* Header */
  header { text-align:center; padding: 48px 0 32px; }
  header h1 {
    font-family: var(--font-display);
    font-size: clamp(3rem, 8vw, 7rem);
    letter-spacing: .12em;
    background: linear-gradient(135deg, #fff 0%, #7c3aed 40%, #06d6a0 70%, #f72585 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height:1;
  }
  header p { font-family:var(--font-mono); font-size:.75rem; color:#555; letter-spacing:.2em; margin-top:10px; }

  /* Status bar */
  .status-bar {
    display:flex; align-items:center; gap:16px; padding:10px 20px;
    background:rgba(6,214,160,.05); border:1px solid rgba(6,214,160,.2);
    border-radius:8px; margin-bottom:28px; font-family:var(--font-mono); font-size:.7rem;
  }
  .dot { width:8px;height:8px;border-radius:50%;background:#06d6a0;
    box-shadow:0 0 8px #06d6a0; animation:pulse 2s infinite; }
  @keyframes pulse { 50%{opacity:.4} }

  /* Main grid */
  .main-grid { display:grid; grid-template-columns:1fr 380px; gap:24px; }
  @media(max-width:900px){.main-grid{grid-template-columns:1fr}}

  /* Glass panel */
  .glass {
    background:var(--c-panel);
    border:1px solid var(--c-border);
    border-radius:20px;
    padding:24px;
    backdrop-filter:blur(16px);
  }
  .glass-sm { padding:16px; border-radius:14px; }

  /* Preview */
  #preview-wrap { position:relative; }
  #preview-wrap::before {
    content:''; position:absolute; inset:-2px; border-radius:22px;
    background: linear-gradient(135deg,#7c3aed,#f72585,#06d6a0);
    z-index:-1; opacity:.6;
  }
  #preview-img {
    width:100%; border-radius:18px; display:block;
    image-rendering: auto;
    transition: opacity .3s;
  }
  #preview-img.loading { opacity:.4; }

  /* Section title */
  .section-title {
    font-family:var(--font-mono); font-size:.65rem; letter-spacing:.2em;
    color:#7c3aed; text-transform:uppercase; margin-bottom:14px;
    display:flex; align-items:center; gap:8px;
  }
  .section-title::after { content:''; flex:1; height:1px; background:rgba(124,58,237,.3); }

  /* Style cards */
  .styles-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:8px; }
  .style-card {
    cursor:pointer; border-radius:12px; padding:10px 6px;
    border:1px solid var(--c-border); text-align:center;
    transition:.2s; position:relative; overflow:hidden;
  }
  .style-card:hover { border-color:#7c3aed; transform:translateY(-2px); }
  .style-card.active { border-color:#06d6a0; box-shadow:0 0 14px rgba(6,214,160,.3); }
  .style-card .swatch { height:24px; border-radius:6px; margin-bottom:6px; }
  .style-card .name { font-size:.6rem; font-family:var(--font-mono); color:#888; }
  .style-card .num  { font-size:.85rem; font-weight:700; color:#fff; }

  /* Inputs */
  .field-group { margin-bottom:14px; }
  .field-group label { font-family:var(--font-mono); font-size:.65rem; color:#555; letter-spacing:.15em; display:block; margin-bottom:6px; }
  .field-group input, .field-group select {
    width:100%; background:rgba(255,255,255,.04); border:1px solid var(--c-border);
    color:#e0e0e0; border-radius:8px; padding:9px 12px; font-size:.85rem; font-family:var(--font-body);
    outline:none; transition:.2s;
  }
  .field-group input:focus, .field-group select:focus { border-color:#7c3aed; box-shadow:0 0 0 3px rgba(124,58,237,.15); }
  .field-group select option { background:#1a1a2e; }
  .row-2 { display:grid; grid-template-columns:1fr 1fr; gap:10px; }

  /* Toggle switches */
  .toggle-row { display:flex; align-items:center; justify-content:space-between; padding:8px 0; border-bottom:1px solid rgba(255,255,255,.04); }
  .toggle-row:last-child { border:none; }
  .toggle-label { font-size:.78rem; color:#aaa; }
  .toggle { position:relative; width:38px; height:20px; }
  .toggle input { opacity:0; width:0; height:0; }
  .toggle-slider {
    position:absolute; cursor:pointer; inset:0; background:#2a2a3a;
    border-radius:20px; transition:.3s;
  }
  .toggle-slider:before {
    content:''; position:absolute; height:14px; width:14px;
    left:3px; bottom:3px; background:#fff; border-radius:50%; transition:.3s;
  }
  .toggle input:checked + .toggle-slider { background:#7c3aed; }
  .toggle input:checked + .toggle-slider:before { transform:translateX(18px); }

  /* Buttons */
  .btn { padding:12px 20px; border-radius:10px; border:none; cursor:pointer; font-weight:600; font-size:.85rem; transition:.2s; display:flex; align-items:center; gap:8px; justify-content:center; }
  .btn-primary { background:linear-gradient(135deg,#7c3aed,#a855f7); color:#fff; }
  .btn-primary:hover { filter:brightness(1.2); transform:translateY(-2px); box-shadow:0 8px 20px rgba(124,58,237,.4); }
  .btn-secondary { background:rgba(255,255,255,.06); color:#ccc; border:1px solid var(--c-border); }
  .btn-secondary:hover { background:rgba(255,255,255,.1); }
  .btn-danger { background:rgba(247,37,133,.15); color:#f72585; border:1px solid rgba(247,37,133,.3); }
  .btn-danger:hover { background:rgba(247,37,133,.25); }
  .btn-row { display:flex; gap:8px; flex-wrap:wrap; }

  /* API Docs */
  .api-table { width:100%; border-collapse:collapse; font-size:.75rem; font-family:var(--font-mono); }
  .api-table th { color:#7c3aed; text-align:left; padding:6px 10px; border-bottom:1px solid rgba(124,58,237,.3); }
  .api-table td { padding:6px 10px; border-bottom:1px solid rgba(255,255,255,.04); color:#aaa; vertical-align:top; }
  .api-table td:first-child { color:#06d6a0; white-space:nowrap; }
  .api-table td:last-child { color:#f72585; }
  code-tag { background:rgba(124,58,237,.2); color:#c084fc; padding:2px 6px; border-radius:4px; font-family:var(--font-mono); font-size:.75rem; }

  /* URL Output */
  #url-output {
    background:rgba(0,0,0,.4); border:1px solid rgba(124,58,237,.3); border-radius:10px;
    padding:12px 16px; font-family:var(--font-mono); font-size:.7rem; color:#06d6a0;
    word-break:break-all; min-height:40px; transition:.2s;
  }

  /* Tabs */
  .tabs { display:flex; gap:4px; margin-bottom:16px; background:rgba(0,0,0,.3); padding:4px; border-radius:10px; }
  .tab { flex:1; text-align:center; padding:8px; border-radius:8px; cursor:pointer; font-size:.75rem; font-family:var(--font-mono); color:#666; transition:.2s; }
  .tab.active { background:rgba(124,58,237,.3); color:#c084fc; }

  /* Range slider */
  input[type=range] { -webkit-appearance:none; width:100%; height:4px; border-radius:2px; background:rgba(255,255,255,.1); outline:none; }
  input[type=range]::-webkit-slider-thumb { -webkit-appearance:none; width:16px; height:16px; border-radius:50%; background:#7c3aed; cursor:pointer; box-shadow:0 0 8px rgba(124,58,237,.6); }

  /* Scrollbar */
  ::-webkit-scrollbar { width:6px; }
  ::-webkit-scrollbar-track { background:transparent; }
  ::-webkit-scrollbar-thumb { background:#333; border-radius:3px; }

  /* Download formats */
  .fmt-btn { flex:1; padding:8px; border-radius:8px; border:1px solid var(--c-border);
    background:rgba(255,255,255,.04); color:#aaa; cursor:pointer; font-family:var(--font-mono); font-size:.7rem; text-align:center; transition:.2s; }
  .fmt-btn.active { border-color:#06d6a0; color:#06d6a0; background:rgba(6,214,160,.08); }
  .fmt-btn:hover { border-color:#7c3aed; }

  /* Toast */
  #toast {
    position:fixed; bottom:30px; left:50%; transform:translateX(-50%) translateY(100px);
    background:#7c3aed; color:#fff; padding:12px 24px; border-radius:12px;
    font-family:var(--font-mono); font-size:.8rem; transition:.4s; z-index:999;
    box-shadow:0 8px 30px rgba(124,58,237,.5);
  }
  #toast.show { transform:translateX(-50%) translateY(0); }

  .tag { display:inline-block; background:rgba(124,58,237,.2); color:#c084fc; padding:2px 8px; border-radius:20px; font-size:.65rem; font-family:var(--font-mono); }
</style>
</head>
<body>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>
<div class="orb orb-3"></div>

<div id="toast">✓ URL copiada al portapapeles</div>

<div class="wrap">
  <header>
    <h1>DEYLIN SYSTEMS</h1>
    <p>BANNER LAB ULTRA · ENGINE V5.0 · PHP 8.x · REST API</p>
  </header>

  <div class="status-bar">
    <div class="dot"></div>
    <span style="color:#06d6a0">SISTEMA OPERATIVO</span>
    <span style="color:#555">|</span>
    <span>API ENDPOINT: <code style="color:#f72585"><?= htmlspecialchars($_SERVER['PHP_SELF']) ?></code></span>
    <span style="color:#555">|</span>
    <span id="req-counter">PARÁMETROS: 0</span>
  </div>

  <div class="main-grid">
    <!-- LEFT: PREVIEW + CONTROLES -->
    <div style="display:flex;flex-direction:column;gap:20px">

      <!-- Preview -->
      <div class="glass">
        <div class="section-title">PREVIEW EN VIVO</div>
        <div id="preview-wrap">
          <canvas id="preview-canvas" style="width:100%;border-radius:18px;display:block;"></canvas>
          <div style="position:absolute;top:12px;left:12px;font-family:var(--font-mono);font-size:.6rem;background:rgba(0,0,0,.6);color:#06d6a0;padding:4px 10px;border-radius:20px;border:1px solid rgba(6,214,160,.3)">⚡ LIVE PREVIEW</div>
        </div>
        <div style="margin-top:14px;display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-primary" onclick="copyApiUrl()">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            Copiar URL API
          </button>
          <button class="btn btn-secondary" onclick="downloadCanvas()">⬇ PNG</button>
          <button class="btn btn-secondary" onclick="openRaw()">Ver PHP</button>
          <div style="display:flex;gap:6px;margin-left:auto" id="fmt-row">
            <div class="fmt-btn active" onclick="setFmt('png',this)">PNG</div>
            <div class="fmt-btn" onclick="setFmt('jpeg',this)">JPEG</div>
          </div>
        </div>
        <div style="margin-top:12px">
          <div class="section-title">URL GENERADA</div>
          <div id="url-output">—</div>
        </div>
      </div>

      <!-- Estilos grid -->
      <div class="glass">
        <div class="section-title">ESTILOS — 20 PRESETS</div>
        <div class="styles-grid" id="style-grid"></div>
      </div>

      <!-- API Docs -->
      <div class="glass">
        <div class="tabs">
          <div class="tab active" onclick="switchTab('params')">PARÁMETROS API</div>
          <div class="tab" onclick="switchTab('examples')">EJEMPLOS</div>
          <div class="tab" onclick="switchTab('integrations')">INTEGRACIONES</div>
        </div>

        <div id="tab-params">
          <table class="api-table">
            <tr><th>Param</th><th>Descripción</th><th>Default</th></tr>
            <tr><td>logo</td><td>URL de imagen de avatar/logo</td><td>—</td></tr>
            <tr><td>estilo</td><td>Número de preset 1–20</td><td>1</td></tr>
            <tr><td>t1</td><td>Texto principal (línea grande)</td><td>DEYLIN SYSTEMS</td></tr>
            <tr><td>t2</td><td>Texto secundario</td><td>PREMIUM BANNER LAB</td></tr>
            <tr><td>sub</td><td>Sub-texto pequeño</td><td>ENGINE V5.0</td></tr>
            <tr><td>w</td><td>Ancho en px (400–2400)</td><td>1200</td></tr>
            <tr><td>h</td><td>Alto en px (200–1200)</td><td>600</td></tr>
            <tr><td>r</td><td>Radio del avatar en px</td><td>200</td></tr>
            <tr><td>ax</td><td>Posición X avatar en % (10–90)</td><td>15</td></tr>
            <tr><td>ay</td><td>Posición Y avatar en % (10–90)</td><td>50</td></tr>
            <tr><td>badge</td><td>Texto del badge/etiqueta</td><td>—</td></tr>
            <tr><td>wm</td><td>Watermark/firma</td><td>deylin.systems</td></tr>
            <tr><td>particles</td><td>Partículas (0/1)</td><td>1</td></tr>
            <tr><td>lines</td><td>Líneas decorativas (0/1)</td><td>1</td></tr>
            <tr><td>glitch</td><td>Efecto glitch (0/1)</td><td>0</td></tr>
            <tr><td>scanlines</td><td>Efecto scanlines (0/1)</td><td>0</td></tr>
            <tr><td>noise</td><td>Ruido/grain (0/1)</td><td>1</td></tr>
            <tr><td>grid</td><td>Grid de fondo (0/1)</td><td>0</td></tr>
            <tr><td>fmt</td><td>Formato: png | jpeg</td><td>png</td></tr>
            <tr><td>q</td><td>Calidad JPEG 10–100</td><td>90</td></tr>
          </table>
        </div>

        <div id="tab-examples" style="display:none">
          <div class="field-group">
            <label>BANNER DISCORD (1200×400)</label>
            <div id="url-output" style="font-size:.65rem;cursor:pointer" onclick="copyText(this)">?logo=TU_LOGO&estilo=2&w=1200&h=400&t1=MI+SERVIDOR&t2=Únete+ahora&badge=NUEVO</div>
          </div>
          <div class="field-group">
            <label>CARD TWITTER (1500×500)</label>
            <div id="url-output" style="font-size:.65rem;cursor:pointer" onclick="copyText(this)">?logo=TU_LOGO&estilo=7&w=1500&h=500&t1=TU+NOMBRE&t2=Developer+%26+Creator&glitch=1</div>
          </div>
          <div class="field-group">
            <label>AVATAR CUADRADO (600×600)</label>
            <div id="url-output" style="font-size:.65rem;cursor:pointer" onclick="copyText(this)">?logo=TU_LOGO&estilo=12&w=600&h=600&r=250&ax=50&ay=50&t1=&t2=</div>
          </div>
          <div class="field-group">
            <label>BANNER TWITCH (1920×480)</label>
            <div id="url-output" style="font-size:.65rem;cursor:pointer" onclick="copyText(this)">?logo=TU_LOGO&estilo=15&w=1920&h=480&t1=LIVE+NOW&t2=Streaming+todos+los+viernes&badge=STREAMING&scanlines=1</div>
          </div>
        </div>

        <div id="tab-integrations" style="display:none">
          <p style="font-size:.8rem;color:#888;margin-bottom:12px">Usa la API directamente en tus proyectos:</p>
          <div class="field-group">
            <label>HTML — IMG TAG</label>
            <div id="url-output" style="font-size:.65rem">&lt;img src="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?logo=URL&estilo=3" alt="Banner"&gt;</div>
          </div>
          <div class="field-group">
            <label>MARKDOWN (Discord/GitHub)</label>
            <div id="url-output" style="font-size:.65rem">![Banner](<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?logo=URL&estilo=3)</div>
          </div>
          <div class="field-group">
            <label>JAVASCRIPT FETCH</label>
            <div id="url-output" style="font-size:.65rem">const url = `<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?logo=${logo}&estilo=5&t1=${encodeURIComponent(text)}`;</div>
          </div>
          <div class="field-group">
            <label>PYTHON REQUESTS</label>
            <div id="url-output" style="font-size:.65rem">requests.get('<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>', params={'logo':url, 'estilo':5, 't1':'Hola'})</div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: PANEL DE CONTROL -->
    <div style="display:flex;flex-direction:column;gap:16px">

      <!-- Textos + Fuentes -->
      <div class="glass glass-sm">
        <div class="section-title">TEXTOS Y TIPOGRAFÍA</div>
        <div class="field-group">
          <label>FUENTE GLOBAL</label>
          <select id="i-font" onchange="renderCanvas()">
            <option value="'Bebas Neue', cursive">Bebas Neue</option>
            <option value="'Orbitron', sans-serif">Orbitron</option>
            <option value="'Anton', sans-serif">Anton</option>
            <option value="'Share Tech Mono', monospace">Share Tech Mono</option>
            <option value="'DM Sans', sans-serif">DM Sans</option>
            <option value="Impact, sans-serif">Impact</option>
            <option value="Georgia, serif">Georgia</option>
          </select>
        </div>
        <div class="field-group">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <label style="margin:0">TEXTO PRINCIPAL (t1)</label>
            <span style="font-family:var(--font-mono);font-size:.6rem;color:#7c3aed">TAMAÑO: <span id="lbl-fs1">72</span>px</span>
          </div>
          <input type="text" id="i-t1" value="DEYLIN SYSTEMS" oninput="renderCanvas()">
          <input type="range" id="i-fs1" min="12" max="200" value="72" style="margin-top:8px"
            oninput="document.getElementById('lbl-fs1').textContent=this.value;renderCanvas()">
        </div>
        <div class="field-group">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <label style="margin:0">TEXTO SECUNDARIO (t2)</label>
            <span style="font-family:var(--font-mono);font-size:.6rem;color:#06d6a0">TAMAÑO: <span id="lbl-fs2">32</span>px</span>
          </div>
          <input type="text" id="i-t2" value="PREMIUM BANNER LAB" oninput="renderCanvas()">
          <input type="range" id="i-fs2" min="8" max="100" value="32" style="margin-top:8px"
            oninput="document.getElementById('lbl-fs2').textContent=this.value;renderCanvas()">
        </div>
        <div class="field-group">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
            <label style="margin:0">SUB-TEXTO (sub)</label>
            <span style="font-family:var(--font-mono);font-size:.6rem;color:#f72585">TAMAÑO: <span id="lbl-fs3">18</span>px</span>
          </div>
          <input type="text" id="i-sub" value="ENGINE V5.0" oninput="renderCanvas()">
          <input type="range" id="i-fs3" min="8" max="60" value="18" style="margin-top:8px"
            oninput="document.getElementById('lbl-fs3').textContent=this.value;renderCanvas()">
        </div>
        <div class="field-group">
          <label>BADGE / ETIQUETA</label>
          <input type="text" id="i-badge" placeholder="ej: NUEVO · LIVE · VIP" oninput="renderCanvas()">
        </div>
        <div class="field-group">
          <label>WATERMARK</label>
          <input type="text" id="i-wm" value="deylin.systems" oninput="renderCanvas()">
        </div>
      </div>

      <!-- Dimensiones -->
      <div class="glass glass-sm">
        <div class="section-title">DIMENSIONES</div>
        <div class="row-2">
          <div class="field-group">
            <label>ANCHO (w)</label>
            <input type="number" id="i-w" value="1200" min="400" max="2400" step="50" oninput="renderCanvas()">
          </div>
          <div class="field-group">
            <label>ALTO (h)</label>
            <input type="number" id="i-h" value="600" min="200" max="1200" step="50" oninput="renderCanvas()">
          </div>
        </div>
        <div class="field-group">
          <label>PRESETS DE TAMAÑO</label>
          <div style="display:flex;flex-wrap:wrap;gap:6px">
            <div class="fmt-btn" onclick="setSize(1200,600)">1200×600</div>
            <div class="fmt-btn" onclick="setSize(1920,480)">1920×480</div>
            <div class="fmt-btn" onclick="setSize(1500,500)">1500×500</div>
            <div class="fmt-btn" onclick="setSize(800,800)">800×800</div>
            <div class="fmt-btn" onclick="setSize(1080,1080)">1080×1080</div>
          </div>
        </div>
      </div>

      <!-- Avatar -->
      <div class="glass glass-sm">
        <div class="section-title">AVATAR / LOGO</div>
        <div class="field-group">
          <label>URL DE IMAGEN</label>
          <input type="url" id="i-logo" placeholder="https://..." oninput="renderCanvas()">
        </div>
        <div class="field-group">
          <label>RADIO (r): <span id="lbl-r">200</span>px</label>
          <input type="range" id="i-r" min="50" max="300" value="200" oninput="document.getElementById('lbl-r').textContent=this.value;renderCanvas()">
        </div>
        <div class="row-2">
          <div class="field-group">
            <label>POS X (ax): <span id="lbl-ax">15</span>%</label>
            <input type="range" id="i-ax" min="10" max="90" value="15" oninput="document.getElementById('lbl-ax').textContent=this.value;renderCanvas()">
          </div>
          <div class="field-group">
            <label>POS Y (ay): <span id="lbl-ay">50</span>%</label>
            <input type="range" id="i-ay" min="10" max="90" value="50" oninput="document.getElementById('lbl-ay').textContent=this.value;renderCanvas()">
          </div>
        </div>
      </div>

      <!-- Efectos -->
      <div class="glass glass-sm">
        <div class="section-title">EFECTOS VISUALES</div>
        <div class="toggle-row">
          <span class="toggle-label">✦ Partículas</span>
          <label class="toggle"><input type="checkbox" id="e-particles" checked onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⟋ Líneas decorativas</span>
          <label class="toggle"><input type="checkbox" id="e-lines" checked onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">▒ Noise / Grain</span>
          <label class="toggle"><input type="checkbox" id="e-noise" checked onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⊞ Grid de fondo</span>
          <label class="toggle"><input type="checkbox" id="e-grid" onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">▬ Scanlines</span>
          <label class="toggle"><input type="checkbox" id="e-scanlines" onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⚡ Efecto Glitch</span>
          <label class="toggle"><input type="checkbox" id="e-glitch" onchange="renderCanvas()"><div class="toggle-slider"></div></label>
        </div>
      </div>

      <!-- Acciones rápidas -->
      <div class="glass glass-sm">
        <div class="section-title">ACCIONES</div>
        <div class="btn-row">
          <button class="btn btn-primary" style="flex:1" onclick="copyApiUrl()">Copiar URL</button>
          <button class="btn btn-secondary" onclick="openRaw()">Abrir</button>
        </div>
        <div class="btn-row" style="margin-top:8px">
          <button class="btn btn-secondary" style="flex:1" onclick="downloadCanvas()">⬇ PNG Directo</button>
          <button class="btn btn-secondary" onclick="downloadImg()">⬇ PHP</button>
          <button class="btn btn-danger" onclick="resetAll()">↺ Reset</button>
        </div>
        <div style="margin-top:10px">
          <div class="field-group">
            <label>CALIDAD JPEG (q)</label>
            <input type="range" id="i-q" min="10" max="100" value="90" oninput="renderCanvas()">
          </div>
        </div>
      </div>

    </div><!-- /right -->
  </div><!-- /main-grid -->

  <footer style="text-align:center;padding:32px 0 16px;font-family:var(--font-mono);font-size:.65rem;color:#333;border-top:1px solid rgba(255,255,255,.05);margin-top:32px">
    DEYLIN SYSTEMS © 2026 · BANNER LAB ULTRA V5.0 · PHP · GD LIBRARY · REST API
    <span style="color:#7c3aed;margin-left:12px">ACCESS: GRANTED</span>
  </footer>
</div>

<script>
// ============================================================
// PRESETS DATA
// ============================================================
const PRESETS = [
  {id:1,  name:'Violet Luxe',    bg:'#0a0a1a', acc:'#a855f7', acc2:'#ec4899'},
  {id:2,  name:'Cyber Neon',     bg:'#141414', acc:'#00ff96', acc2:'#00cfff'},
  {id:3,  name:'Synthwave',      bg:'#280028', acc:'#ff1493', acc2:'#ff8c00'},
  {id:4,  name:'Deep Blue',      bg:'#080820', acc:'#0096ff', acc2:'#00e5c8'},
  {id:5,  name:'Blood Red',      bg:'#190a0a', acc:'#ff2d2d', acc2:'#ff9900'},
  {id:6,  name:'Acid Green',     bg:'#0a1e0a', acc:'#adff2f', acc2:'#00ff64'},
  {id:7,  name:'Luxury Gold',    bg:'#0a0800', acc:'#ffd700', acc2:'#ffb400'},
  {id:8,  name:'White Studio',   bg:'#141428', acc:'#ffffff', acc2:'#b4b4ff'},
  {id:9,  name:'Pink Shadow',    bg:'#0a060a', acc:'#ec4899', acc2:'#b400b4'},
  {id:10, name:'Coral Night',    bg:'#191919', acc:'#ff7f50', acc2:'#ff501e'},
  {id:11, name:'Ice Glacier',    bg:'#040a14', acc:'#00cfff', acc2:'#0082ff'},
  {id:12, name:'Ember',          bg:'#180500', acc:'#ff5a00', acc2:'#ffc800'},
  {id:13, name:'Lavender Mist',  bg:'#0c0814', acc:'#c084fc', acc2:'#ec4899'},
  {id:14, name:'Teal Matrix',    bg:'#020e0c', acc:'#00e5c8', acc2:'#00b4a0'},
  {id:15, name:'Rose Gold',      bg:'#160c0c', acc:'#f4a1a1', acc2:'#ffc8b4'},
  {id:16, name:'Solar Flare',    bg:'#0e0800', acc:'#fbbf24', acc2:'#ff7800'},
  {id:17, name:'Ultraviolet',    bg:'#07010f', acc:'#8b5cf6', acc2:'#ec4899'},
  {id:18, name:'Mercury',        bg:'#0a0a0a', acc:'#dcdcdc', acc2:'#969696'},
  {id:19, name:'Abyssal',        bg:'#000508', acc:'#10b981', acc2:'#065f46'},
  {id:20, name:'Hologram',       bg:'#040010', acc:'#7fdbff', acc2:'#c864ff'},
];

let currentStyle = 1;
let currentFmt   = 'png';
let avatarImg    = null;   // ImageBitmap del avatar cargado
let avatarUrl    = '';

// ============================================================
// Render style cards
// ============================================================
const styleGrid = document.getElementById('style-grid');
PRESETS.forEach(p => {
  const d = document.createElement('div');
  d.className = 'style-card';
  d.id = `sc-${p.id}`;
  d.innerHTML = `
    <div class="swatch" style="background:linear-gradient(135deg,${p.bg},${p.acc})"></div>
    <div class="num">#${String(p.id).padStart(2,'0')}</div>
    <div class="name">${p.name}</div>`;
  d.onclick = () => changeStyle(p.id);
  styleGrid.appendChild(d);
});
document.getElementById('sc-1').classList.add('active');

function changeStyle(id) {
  document.querySelectorAll('.style-card').forEach(c => c.classList.remove('active'));
  document.getElementById(`sc-${id}`)?.classList.add('active');
  currentStyle = id;
  renderCanvas();
}

// ============================================================
// CANVAS PREVIEW EN TIEMPO REAL
// ============================================================
const previewCanvas = document.getElementById('preview-canvas');
const ctx = previewCanvas.getContext('2d');

function hexToRgb(hex) {
  const r = parseInt(hex.slice(1,3),16);
  const g = parseInt(hex.slice(3,5),16);
  const b = parseInt(hex.slice(5,7),16);
  return {r,g,b};
}

function renderCanvas() {
  const W = parseInt(document.getElementById('i-w').value) || 1200;
  const H = parseInt(document.getElementById('i-h').value) || 600;
  previewCanvas.width  = W;
  previewCanvas.height = H;

  const p    = PRESETS[currentStyle-1] || PRESETS[0];
  const bg   = hexToRgb(p.bg);
  const acc  = hexToRgb(p.acc);
  const acc2 = hexToRgb(p.acc2);

  // --- FONDO gradient ---
  const bgGrad = ctx.createLinearGradient(0,0,0,H);
  bgGrad.addColorStop(0, p.bg);
  bgGrad.addColorStop(1, `rgb(${Math.min(255,bg.r+20)},${Math.min(255,bg.g+20)},${Math.min(255,bg.b+20)})`);
  ctx.fillStyle = bgGrad;
  ctx.fillRect(0,0,W,H);

  // --- GRID ---
  const showGrid = document.getElementById('e-grid').checked;
  if (showGrid) {
    ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.06)`;
    ctx.lineWidth = 1;
    const step = Math.round(W/24);
    for(let x=0; x<W; x+=step) { ctx.beginPath(); ctx.moveTo(x,0); ctx.lineTo(x,H); ctx.stroke(); }
    for(let y=0; y<H; y+=step) { ctx.beginPath(); ctx.moveTo(0,y); ctx.lineTo(W,y); ctx.stroke(); }
  }

  // --- GLOW 1 (acc) ---
  const gx1 = W*0.65, gy1 = H*0.5;
  const gr1 = ctx.createRadialGradient(gx1,gy1,0,gx1,gy1,Math.max(W,H)*0.55);
  gr1.addColorStop(0, `rgba(${acc.r},${acc.g},${acc.b},0.18)`);
  gr1.addColorStop(1, 'transparent');
  ctx.fillStyle = gr1;
  ctx.fillRect(0,0,W,H);

  // --- GLOW 2 (acc2) ---
  const gx2 = W*0.28, gy2 = H*0.18;
  const gr2 = ctx.createRadialGradient(gx2,gy2,0,gx2,gy2,Math.max(W,H)*0.38);
  gr2.addColorStop(0, `rgba(${acc2.r},${acc2.g},${acc2.b},0.16)`);
  gr2.addColorStop(1, 'transparent');
  ctx.fillStyle = gr2;
  ctx.fillRect(0,0,W,H);

  // --- LÍNEAS DECORATIVAS ---
  const showLines = document.getElementById('e-lines').checked;
  if (showLines) {
    ctx.save();
    for(let i=0;i<6;i++) {
      const lx = (W/6)*i + W*0.05;
      ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.06)`;
      ctx.lineWidth = 1;
      ctx.beginPath();
      ctx.moveTo(lx - H, -20);
      ctx.lineTo(lx + H, H+20);
      ctx.stroke();
    }
    ctx.restore();
  }

  // --- PARTÍCULAS ---
  const showParticles = document.getElementById('e-particles').checked;
  if (showParticles) {
    for(let i=0;i<100;i++) {
      const px = Math.random()*W;
      const py = Math.random()*H;
      const ps = Math.random()*4+1;
      const useAcc2 = i%3===0;
      const col = useAcc2 ? acc2 : acc;
      ctx.fillStyle = `rgba(${col.r},${col.g},${col.b},${Math.random()*0.3+0.05})`;
      ctx.beginPath();
      ctx.arc(px,py,ps/2,0,Math.PI*2);
      ctx.fill();
    }
  }

  // --- SCANLINES ---
  const showScanlines = document.getElementById('e-scanlines').checked;
  if (showScanlines) {
    ctx.fillStyle = 'rgba(0,0,0,0.08)';
    for(let y=0; y<H; y+=3) {
      ctx.fillRect(0, y, W, 1);
    }
  }

  // --- NOISE ---
  const showNoise = document.getElementById('e-noise').checked;
  if (showNoise) {
    const noiseData = ctx.createImageData(W,H);
    for(let i=0; i<noiseData.data.length; i+=4) {
      const v = Math.random()*30;
      noiseData.data[i]   = v;
      noiseData.data[i+1] = v;
      noiseData.data[i+2] = v;
      noiseData.data[i+3] = Math.random()*18;
    }
    ctx.putImageData(noiseData, 0, 0);
  }

  // --- AVATAR ---
  const r    = parseInt(document.getElementById('i-r').value) || 200;
  const axPc = parseInt(document.getElementById('i-ax').value) || 15;
  const ayPc = parseInt(document.getElementById('i-ay').value) || 50;
  const avCx = W * axPc/100;
  const avCy = H * ayPc/100;
  const diam = r*2;

  if (avatarImg) {
    // Sombra
    ctx.save();
    ctx.shadowColor = `rgba(${acc.r},${acc.g},${acc.b},0.5)`;
    ctx.shadowBlur  = 40;
    ctx.beginPath();
    ctx.arc(avCx, avCy, r+2, 0, Math.PI*2);
    ctx.clip();
    ctx.drawImage(avatarImg, avCx-r, avCy-r, diam, diam);
    ctx.restore();

    // Anillo glow externo acc2
    for(let ri=14; ri>0; ri-=2) {
      ctx.strokeStyle = `rgba(${acc2.r},${acc2.g},${acc2.b},${ri*0.025})`;
      ctx.lineWidth = ri;
      ctx.beginPath();
      ctx.arc(avCx, avCy, r+ri, 0, Math.PI*2);
      ctx.stroke();
    }
    // Anillo interno acc
    for(let ri=6; ri>0; ri-=2) {
      ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},${ri*0.06})`;
      ctx.lineWidth = ri;
      ctx.beginPath();
      ctx.arc(avCx, avCy, r-ri/2, 0, Math.PI*2);
      ctx.stroke();
    }
  } else {
    // Placeholder avatar
    const plGrad = ctx.createRadialGradient(avCx,avCy,0,avCx,avCy,r);
    plGrad.addColorStop(0, `rgba(${acc.r},${acc.g},${acc.b},0.2)`);
    plGrad.addColorStop(1, `rgba(${acc.r},${acc.g},${acc.b},0.04)`);
    ctx.fillStyle = plGrad;
    ctx.beginPath();
    ctx.arc(avCx, avCy, r, 0, Math.PI*2);
    ctx.fill();
    ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.4)`;
    ctx.lineWidth = 2;
    ctx.stroke();
    // Icono
    ctx.fillStyle = `rgba(${acc.r},${acc.g},${acc.b},0.5)`;
    ctx.font = `${r*0.5}px Arial`;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText('◎', avCx, avCy);
  }

  // --- TEXTOS ---
  const font    = document.getElementById('i-font').value;
  const t1      = document.getElementById('i-t1').value.toUpperCase();
  const t2      = document.getElementById('i-t2').value.toUpperCase();
  const sub     = document.getElementById('i-sub').value.toUpperCase();
  const badge   = document.getElementById('i-badge').value.toUpperCase();
  const wm      = document.getElementById('i-wm').value;
  const fs1     = parseInt(document.getElementById('i-fs1').value) || 72;
  const fs2     = parseInt(document.getElementById('i-fs2').value) || 32;
  const fs3     = parseInt(document.getElementById('i-fs3').value) || 18;

  // Zona de texto (a la derecha del avatar, o izquierda si avatar está a la derecha)
  let textX = avCx + r + 40;
  if (textX > W*0.7) textX = 60;
  const textZoneW = W - textX - 40;

  let ty = H/2 - (fs1 + fs2 + fs3 + 40) / 2;

  // Línea acento decorativa
  ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.9)`;
  ctx.lineWidth   = 3;
  ctx.beginPath();
  ctx.moveTo(textX, ty - 14);
  ctx.lineTo(textX + 50, ty - 14);
  ctx.stroke();

  // SUB
  if (sub) {
    ctx.font      = `${fs3}px ${font}`;
    ctx.fillStyle = `rgba(${acc2.r},${acc2.g},${acc2.b},0.95)`;
    ctx.textAlign = 'left';
    ctx.textBaseline = 'top';
    ctx.fillText(sub, textX, ty);
  }
  ty += fs3 + 10;

  // T1 — principal con glow
  if (t1) {
    ctx.font      = `bold ${fs1}px ${font}`;
    ctx.textAlign = 'left';
    ctx.textBaseline = 'top';
    // Sombra
    ctx.shadowColor  = `rgba(${acc.r},${acc.g},${acc.b},0.6)`;
    ctx.shadowBlur   = 20;
    ctx.fillStyle    = '#ffffff';
    ctx.fillText(t1, textX, ty);
    ctx.shadowBlur   = 0;
    // Línea bajo T1
    const t1W = Math.min(ctx.measureText(t1).width, textZoneW);
    const lineGrad = ctx.createLinearGradient(textX, 0, textX+t1W, 0);
    lineGrad.addColorStop(0, `rgba(${acc.r},${acc.g},${acc.b},0.8)`);
    lineGrad.addColorStop(1, 'transparent');
    ctx.strokeStyle = lineGrad;
    ctx.lineWidth   = 2;
    ctx.beginPath();
    ctx.moveTo(textX, ty + fs1 + 4);
    ctx.lineTo(textX + t1W, ty + fs1 + 4);
    ctx.stroke();
  }
  ty += fs1 + 16;

  // T2
  if (t2) {
    ctx.font      = `${fs2}px ${font}`;
    ctx.fillStyle = `rgba(${acc.r},${acc.g},${acc.b},0.9)`;
    ctx.textBaseline = 'top';
    ctx.fillText(t2, textX, ty);
  }
  ty += fs2 + 16;

  // Separador
  ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.3)`;
  ctx.lineWidth   = 1;
  ctx.beginPath();
  ctx.moveTo(textX, ty);
  ctx.lineTo(textX+80, ty);
  ctx.stroke();
  ty += 12;

  // Preset name small
  ctx.font      = `${Math.max(12, Math.round(fs3*0.8))}px 'Share Tech Mono', monospace`;
  ctx.fillStyle = 'rgba(130,130,140,0.8)';
  ctx.fillText(`STYLE: ${p.name} · #${String(currentStyle).padStart(2,'0')}`, textX, ty);

  // --- BADGE ---
  if (badge) {
    ctx.font = `bold ${Math.max(14, Math.round(fs3*0.9))}px ${font}`;
    const bW = ctx.measureText(badge).width + 32;
    const bH = Math.max(30, fs3 + 12);
    const bx = W - bW - 30;
    const by = 24;
    ctx.fillStyle = `rgba(${acc.r},${acc.g},${acc.b},0.18)`;
    ctx.beginPath();
    ctx.roundRect(bx, by, bW, bH, 6);
    ctx.fill();
    ctx.strokeStyle = `rgba(${acc.r},${acc.g},${acc.b},0.8)`;
    ctx.lineWidth = 1.5;
    ctx.stroke();
    ctx.fillStyle   = '#ffffff';
    ctx.textBaseline = 'middle';
    ctx.textAlign   = 'center';
    ctx.fillText(badge, bx + bW/2, by + bH/2);
  }

  // --- WATERMARK ---
  if (wm) {
    ctx.font = `12px 'Share Tech Mono', monospace`;
    ctx.fillStyle   = 'rgba(255,255,255,0.2)';
    ctx.textAlign   = 'right';
    ctx.textBaseline= 'bottom';
    ctx.fillText(wm, W-14, H-10);
  }

  // --- BORDE ---
  const borderGrad = ctx.createLinearGradient(0,0,W,H);
  borderGrad.addColorStop(0,   `rgba(${acc.r},${acc.g},${acc.b},0.6)`);
  borderGrad.addColorStop(0.5, `rgba(${acc2.r},${acc2.g},${acc2.b},0.4)`);
  borderGrad.addColorStop(1,   `rgba(${acc.r},${acc.g},${acc.b},0.6)`);
  ctx.strokeStyle = borderGrad;
  ctx.lineWidth = 3;
  ctx.strokeRect(8,8,W-16,H-16);

  // Update URL output
  updateUrlOutput();
}

// ============================================================
// Carga del avatar
// ============================================================
let avatarLoadTimer;
document.getElementById('i-logo').addEventListener('input', function() {
  clearTimeout(avatarLoadTimer);
  avatarLoadTimer = setTimeout(() => loadAvatar(this.value), 500);
});

function loadAvatar(url) {
  if (!url) { avatarImg = null; renderCanvas(); return; }
  const img = new Image();
  img.crossOrigin = 'anonymous';
  img.onload = () => {
    createImageBitmap(img).then(bmp => {
      avatarImg = bmp;
      avatarUrl = url;
      renderCanvas();
    });
  };
  img.onerror = () => { avatarImg = null; renderCanvas(); };
  img.src = url;
}

// Cargar avatar por defecto al arrancar
loadAvatar('<?= $img_predeterminada ?>');
document.getElementById('i-logo').value = '';

// ============================================================
// Listeners para todos los controles que disparan renderCanvas
// ============================================================
['i-w','i-h','i-r','i-ax','i-ay','i-q'].forEach(id => {
  const el = document.getElementById(id);
  if(el) el.addEventListener('input', renderCanvas);
});
['e-particles','e-lines','e-noise','e-grid','e-scanlines','e-glitch'].forEach(id => {
  const el = document.getElementById(id);
  if(el) el.addEventListener('change', renderCanvas);
});

// ============================================================
// Build URL completa para el servidor PHP
// ============================================================
function buildUrl() {
  const logo  = document.getElementById('i-logo').value || '<?= $img_predeterminada ?>';
  const t1    = encodeURIComponent(document.getElementById('i-t1').value);
  const t2    = encodeURIComponent(document.getElementById('i-t2').value);
  const sub   = encodeURIComponent(document.getElementById('i-sub').value);
  const badge = encodeURIComponent(document.getElementById('i-badge').value);
  const wm    = encodeURIComponent(document.getElementById('i-wm').value);
  const w     = document.getElementById('i-w').value;
  const h     = document.getElementById('i-h').value;
  const r     = document.getElementById('i-r').value;
  const ax    = document.getElementById('i-ax').value;
  const ay    = document.getElementById('i-ay').value;
  const q     = document.getElementById('i-q').value;
  const fs1   = document.getElementById('i-fs1').value;
  const fs2   = document.getElementById('i-fs2').value;
  const fs3   = document.getElementById('i-fs3').value;
  const particles = document.getElementById('e-particles').checked?1:0;
  const lines   = document.getElementById('e-lines').checked?1:0;
  const noise   = document.getElementById('e-noise').checked?1:0;
  const grid    = document.getElementById('e-grid').checked?1:0;
  const scanlines = document.getElementById('e-scanlines').checked?1:0;
  const glitch  = document.getElementById('e-glitch').checked?1:0;

  const base = window.location.pathname;
  const params = new URLSearchParams({
    logo, estilo: currentStyle, t1, t2, sub, badge, wm,
    w, h, r, ax, ay, particles, lines, noise, grid, scanlines, glitch,
    fmt: currentFmt, q,
    fs1, fs2, fs3
  });
  return `${base}?${params.toString()}`;
}

function updateUrlOutput() {
  const url = window.location.origin + buildUrl();
  document.getElementById('url-output').textContent = url;
  const sp = new URLSearchParams(buildUrl().split('?')[1]);
  document.getElementById('req-counter').textContent = `PARÁMETROS: ${sp.size}`;
}

function copyApiUrl() {
  navigator.clipboard.writeText(window.location.origin + buildUrl());
  showToast('✓ URL copiada al portapapeles');
}
function openRaw() {
  window.open(buildUrl(), '_blank');
}
function downloadCanvas() {
  const a = document.createElement('a');
  a.download = `banner_estilo${currentStyle}.png`;
  a.href = previewCanvas.toDataURL('image/png');
  a.click();
}
function downloadImg() {
  const a = document.createElement('a');
  a.href = buildUrl();
  a.download = `banner_estilo${currentStyle}.${currentFmt}`;
  a.click();
}

function setFmt(fmt, el) {
  currentFmt = fmt;
  document.querySelectorAll('.fmt-btn').forEach(b => b.classList.remove('active'));
  el.classList.add('active');
}

function setSize(w, h) {
  document.getElementById('i-w').value = w;
  document.getElementById('i-h').value = h;
  renderCanvas();
}

function resetAll() {
  document.getElementById('i-t1').value  = 'DEYLIN SYSTEMS';
  document.getElementById('i-t2').value  = 'PREMIUM BANNER LAB';
  document.getElementById('i-sub').value = 'ENGINE V5.0';
  document.getElementById('i-badge').value = '';
  document.getElementById('i-wm').value  = 'deylin.systems';
  document.getElementById('i-w').value   = 1200;
  document.getElementById('i-h').value   = 600;
  document.getElementById('i-r').value   = 200;
  document.getElementById('i-ax').value  = 15;
  document.getElementById('i-ay').value  = 50;
  document.getElementById('i-fs1').value = 72;
  document.getElementById('i-fs2').value = 32;
  document.getElementById('i-fs3').value = 18;
  document.getElementById('lbl-r').textContent  = 200;
  document.getElementById('lbl-ax').textContent = 15;
  document.getElementById('lbl-ay').textContent = 50;
  document.getElementById('lbl-fs1').textContent= 72;
  document.getElementById('lbl-fs2').textContent= 32;
  document.getElementById('lbl-fs3').textContent= 18;
  document.getElementById('e-particles').checked = true;
  document.getElementById('e-lines').checked = true;
  document.getElementById('e-noise').checked = true;
  document.getElementById('e-grid').checked = false;
  document.getElementById('e-scanlines').checked = false;
  document.getElementById('e-glitch').checked = false;
  changeStyle(1);
}

function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2500);
}
function copyText(el) {
  navigator.clipboard.writeText(el.textContent);
  showToast('✓ Copiado');
}
function switchTab(name) {
  ['params','examples','integrations'].forEach(t => {
    document.getElementById(`tab-${t}`).style.display = t===name?'':'none';
  });
  document.querySelectorAll('.tab').forEach((t,i) => {
    t.classList.toggle('active', ['params','examples','integrations'][i]===name);
  });
}
</script>
</body>
</html>
<?php
    exit;
}

// ============================================================
// ENGINE DE GENERACIÓN DE IMAGEN
// ============================================================

$w = $width; $h = $height;
$canvas = imagecreatetruecolor($w, $h);
imagealphablending($canvas, true);
imagesavealpha($canvas, true);

// ---- PALETA DE 20 PRESETS ----
$presets = [
  1  => ['bg'=>[10,10,26],    'acc'=>[168,85,247],  'acc2'=>[236,72,153],  'name'=>'Violet Luxe'],
  2  => ['bg'=>[14,14,14],    'acc'=>[0,255,150],   'acc2'=>[0,200,255],   'name'=>'Cyber Neon'],
  3  => ['bg'=>[28,0,28],     'acc'=>[255,20,147],  'acc2'=>[255,140,0],   'name'=>'Synthwave'],
  4  => ['bg'=>[8,8,30],      'acc'=>[0,150,255],   'acc2'=>[0,230,200],   'name'=>'Deep Blue'],
  5  => ['bg'=>[20,8,8],      'acc'=>[255,40,40],   'acc2'=>[255,160,0],   'name'=>'Blood Red'],
  6  => ['bg'=>[8,22,8],      'acc'=>[173,255,47],  'acc2'=>[0,255,100],   'name'=>'Acid Green'],
  7  => ['bg'=>[10,8,0],      'acc'=>[255,215,0],   'acc2'=>[255,180,0],   'name'=>'Luxury Gold'],
  8  => ['bg'=>[20,20,36],    'acc'=>[255,255,255], 'acc2'=>[180,180,255], 'name'=>'White Studio'],
  9  => ['bg'=>[10,6,10],     'acc'=>[236,72,153],  'acc2'=>[180,0,180],   'name'=>'Pink Shadow'],
  10 => ['bg'=>[20,14,10],    'acc'=>[255,127,80],  'acc2'=>[255,80,30],   'name'=>'Coral Night'],
  11 => ['bg'=>[4,10,20],     'acc'=>[0,207,255],   'acc2'=>[0,130,255],   'name'=>'Ice Glacier'],
  12 => ['bg'=>[24,8,0],      'acc'=>[255,90,0],    'acc2'=>[255,200,0],   'name'=>'Ember'],
  13 => ['bg'=>[12,8,20],     'acc'=>[192,132,252], 'acc2'=>[236,72,153],  'name'=>'Lavender Mist'],
  14 => ['bg'=>[2,14,12],     'acc'=>[0,229,200],   'acc2'=>[0,180,160],   'name'=>'Teal Matrix'],
  15 => ['bg'=>[22,12,12],    'acc'=>[244,160,160], 'acc2'=>[255,200,180], 'name'=>'Rose Gold'],
  16 => ['bg'=>[14,10,0],     'acc'=>[251,191,36],  'acc2'=>[255,120,0],   'name'=>'Solar Flare'],
  17 => ['bg'=>[7,1,15],      'acc'=>[139,92,246],  'acc2'=>[236,72,153],  'name'=>'Ultraviolet'],
  18 => ['bg'=>[10,10,10],    'acc'=>[220,220,220], 'acc2'=>[150,150,150], 'name'=>'Mercury'],
  19 => ['bg'=>[0,5,8],       'acc'=>[16,185,129],  'acc2'=>[6,95,70],     'name'=>'Abyssal'],
  20 => ['bg'=>[4,0,16],      'acc'=>[127,219,255], 'acc2'=>[200,100,255], 'name'=>'Hologram'],
];

$cfg = $presets[$estilo] ?? $presets[1];
[$br,$bg,$bb] = $cfg['bg'];
[$ar,$ag,$ab] = $cfg['acc'];
[$a2r,$a2g,$a2b] = $cfg['acc2'];

// === FONDO con degradado vertical ===
for($y=0; $y<$h; $y++) {
    $t = $y/$h;
    // Mezcla fondo base con un tono más oscuro arriba
    $r = (int)($br + ($br*0.5)*$t);
    $g = (int)($bg + ($bg*0.5)*$t);
    $b = (int)($bb + ($bb*0.5)*$t);
    $col = imagecolorallocate($canvas, min(255,$r), min(255,$g), min(255,$b));
    imageline($canvas, 0, $y, $w-1, $y, $col);
}

// === EFECTO GRID DE FONDO ===
if ($show_grid) {
    $gc = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 120);
    $step = (int)($w / 24);
    for($gx=0; $gx<$w; $gx+=$step) imageline($canvas, $gx, 0, $gx, $h-1, $gc);
    for($gy=0; $gy<$h; $gy+=$step) imageline($canvas, 0, $gy, $w-1, $gy, $gc);
}

// === GLOW RADIAL CENTRAL (pintado línea a línea) ===
$cx = (int)($w * 0.65);
$cy = (int)($h * 0.5);
$glow_r = (int)(max($w,$h) * 0.6);
for($i=$glow_r; $i>0; $i-=4) {
    $alpha = (int)(127 - (($glow_r - $i) / $glow_r) * 127 * 0.7);
    $alpha = max(100, $alpha);
    $gf = imagecolorallocatealpha($canvas, $ar, $ag, $ab, $alpha);
    imagefilledellipse($canvas, $cx, $cy, $i*2, $i*2, $gf);
}

// === SEGUNDO GLOW ACC2 ===
$gx2 = (int)($w * 0.3);
$gy2 = (int)($h * 0.2);
$gr2 = (int)(max($w,$h) * 0.4);
for($i=$gr2; $i>0; $i-=5) {
    $alpha = (int)(127 - (($gr2 - $i) / $gr2) * 127 * 0.6);
    $alpha = max(110, $alpha);
    $gf2 = imagecolorallocatealpha($canvas, $a2r, $a2g, $a2b, $alpha);
    imagefilledellipse($canvas, $gx2, $gy2, $i*2, (int)($i*1.4), $gf2);
}

// === LÍNEAS DIAGONALES DECORATIVAS ===
if ($show_lines) {
    for($i=0; $i<8; $i++) {
        $lx = rand(0, $w);
        $la = imagecolorallocatealpha($canvas, $ar, $ag, $ab, rand(100,120));
        imageline($canvas, $lx - $h, -20, $lx + $h, $h+20, $la);
    }
    // Líneas horizontales finas
    for($i=0; $i<4; $i++) {
        $ly = rand((int)($h*0.1), (int)($h*0.9));
        $lw2 = rand(100, $w);
        $lx2 = rand(0, $w - $lw2);
        $la2 = imagecolorallocatealpha($canvas, $a2r, $a2g, $a2b, rand(105,118));
        imageline($canvas, $lx2, $ly, $lx2+$lw2, $ly, $la2);
    }
}

// === PARTÍCULAS ===
if ($show_particles) {
    for($i=0; $i<120; $i++) {
        $px = rand(0, $w);
        $py = rand(0, $h);
        $ps = rand(1, 5);
        $use_acc2 = ($i % 3 === 0);
        $pr = $use_acc2 ? $a2r : $ar;
        $pg = $use_acc2 ? $a2g : $ag;
        $pb = $use_acc2 ? $a2b : $ab;
        $pa = imagecolorallocatealpha($canvas, $pr, $pg, $pb, rand(90,118));
        imagefilledellipse($canvas, $px, $py, $ps, $ps, $pa);
    }
}

// === NOISE / GRAIN ===
if ($show_noise) {
    for($i=0; $i<($w*$h)/80; $i++) {
        $nx = rand(0, $w-1);
        $ny = rand(0, $h-1);
        $nv = rand(0,60);
        $na = imagecolorallocatealpha($canvas, $nv, $nv, $nv, rand(110,125));
        imagesetpixel($canvas, $nx, $ny, $na);
    }
}

// === BORDE PREMIUM (degradado multi-capa) ===
$border_max = 20;
for($i=0; $i<$border_max; $i++) {
    $progress = $i / $border_max;
    // Interpola entre acc y acc2
    $br2 = (int)($ar + ($a2r - $ar) * $progress);
    $bg2 = (int)($ag + ($a2g - $ag) * $progress);
    $bb2 = (int)($ab + ($a2b - $ab) * $progress);
    $alpha_b = (int)(20 + $progress * 100);
    $bc = imagecolorallocatealpha($canvas, $br2, $bg2, $bb2, min(127, $alpha_b));
    imagerectangle($canvas, $i, $i, $w-$i-1, $h-$i-1, $bc);
}

// === SCANLINES ===
if ($show_scanlines) {
    $sl_col = imagecolorallocatealpha($canvas, 0, 0, 0, 115);
    for($y=0; $y<$h; $y+=3) {
        imageline($canvas, 0, $y, $w-1, $y, $sl_col);
    }
}

// === CARGAR E INSERTAR AVATAR ===
$ch = curl_init($url_logo);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; BannerBot/5.0)',
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT        => 10,
]);
$raw = curl_exec($ch);
curl_close($ch);

$avatar_size = $radius * 2;
$av_cx = (int)($w * $avatar_x / 100);
$av_cy = (int)($h * $avatar_y / 100);
$av_left = $av_cx - $radius;
$av_top  = $av_cy - $radius;

if ($raw) {
    $logo_img = @imagecreatefromstring($raw);
    if ($logo_img) {
        $lw = imagesx($logo_img);
        $lh = imagesy($logo_img);

        // Sombra del avatar (multi-capa)
        for($si=40; $si>0; $si-=4) {
            $sa = (int)(127 - ($si/40)*50);
            $sh_c = imagecolorallocatealpha($canvas, 0, 0, 0, $sa);
            imagefilledellipse($canvas, $av_cx+6, $av_cy+8, $avatar_size+$si, $avatar_size+$si, $sh_c);
        }

        // Anillo exterior (glow acc2)
        for($ri=0; $ri<16; $ri++) {
            $ra = (int)(40 + $ri*5);
            $ring_c = imagecolorallocatealpha($canvas, $a2r, $a2g, $a2b, min(127,127-$ri*6));
            imageellipse($canvas, $av_cx, $av_cy, $avatar_size+$ri*2, $avatar_size+$ri*2, $ring_c);
        }

        // Anillo interior acc
        for($ri=0; $ri<8; $ri++) {
            $ring_c2 = imagecolorallocatealpha($canvas, $ar, $ag, $ab, max(0,127-$ri*12));
            imageellipse($canvas, $av_cx, $av_cy, $avatar_size-$ri*2, $avatar_size-$ri*2, $ring_c2);
        }

        // Crear máscara circular y recortar avatar
        $tmp = imagecreatetruecolor($avatar_size, $avatar_size);
        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        $trans = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
        imagefilledrectangle($tmp, 0, 0, $avatar_size, $avatar_size, $trans);
        imagealphablending($tmp, true);
        imagecopyresampled($tmp, $logo_img, 0, 0, 0, 0, $avatar_size, $avatar_size, $lw, $lh);

        // Aplicar máscara circular
        $masked = imagecreatetruecolor($avatar_size, $avatar_size);
        imagealphablending($masked, false);
        imagesavealpha($masked, true);
        $clear = imagecolorallocatealpha($masked, 0, 0, 0, 127);
        imagefilledrectangle($masked, 0, 0, $avatar_size, $avatar_size, $clear);
        imagealphablending($masked, true);

        for($px2=0; $px2<$avatar_size; $px2++) {
            for($py2=0; $py2<$avatar_size; $py2++) {
                $dx = $px2 - $radius;
                $dy = $py2 - $radius;
                if(($dx*$dx + $dy*$dy) <= ($radius*$radius)) {
                    $col_pix = imagecolorat($tmp, $px2, $py2);
                    imagesetpixel($masked, $px2, $py2, $col_pix);
                }
            }
        }

        imagecopy($canvas, $masked, $av_left, $av_top, 0, 0, $avatar_size, $avatar_size);
        imagedestroy($tmp);
        imagedestroy($masked);
        imagedestroy($logo_img);
    }
}

// === EFECTO GLITCH (shift horizontal del avatar zone) ===
if ($show_glitch) {
    for($gi=0; $gi<5; $gi++) {
        $gy_glitch = rand($av_top, $av_top + $avatar_size);
        $gh = rand(2, 12);
        $shift = rand(-15,15);
        // Copia una franja y la reposiciona con shift
        $strip = imagecreatetruecolor($w, $gh);
        imagecopy($strip, $canvas, 0, 0, 0, $gy_glitch, $w, $gh);
        $gc_col = imagecolorallocatealpha($canvas, $ar, 0, $ab, 90);
        imagefilledrectangle($canvas, 0, $gy_glitch, $w-1, $gy_glitch+$gh, $gc_col);
        imagecopy($canvas, $strip, $shift, $gy_glitch, 0, 0, $w, $gh);
        imagedestroy($strip);
    }
}

// === TEXTOS con soporte de tamaño escalado ===
// GD tiene solo 5 fuentes built-in (1=8px, 2=13px, 3=13px, 4=15px, 5=15px)
// Para textos grandes usamos imagecopyresampled para escalar un canvas temporal

function ds_text_scaled($canvas, $gd_size, $x, $y, $text, $color, $scale=1, $shadow_col=null) {
    if ($scale <= 1) {
        if ($shadow_col) imagestring($canvas, $gd_size, $x+2, $y+2, $text, $shadow_col);
        imagestring($canvas, $gd_size, $x, $y, $text, $color);
        return;
    }
    // Calcula tamaño base de la fuente GD
    $char_w = imagefontwidth($gd_size);
    $char_h = imagefontheight($gd_size);
    $base_w = strlen($text) * $char_w;
    $base_h = $char_h;
    $pad = 4;
    // Dibuja en canvas pequeño
    $tmp = imagecreatetruecolor($base_w + $pad*2, $base_h + $pad*2);
    $trans = imagecolorallocate($tmp, 1, 1, 1);
    imagecolortransparent($tmp, $trans);
    imagefill($tmp, 0, 0, $trans);
    $white_tmp = imagecolorallocate($tmp, 255, 255, 255);
    imagestring($tmp, $gd_size, $pad, $pad, $text, $white_tmp);
    // Escala al canvas principal
    $dst_w = (int)(($base_w + $pad*2) * $scale);
    $dst_h = (int)(($base_h + $pad*2) * $scale);
    // Sombra
    if ($shadow_col) {
        imagecopyresampled($canvas, $tmp, $x+3, $y+3, 0, 0, $dst_w, $dst_h, $base_w+$pad*2, $base_h+$pad*2);
    }
    imagecopyresampled($canvas, $tmp, $x, $y, 0, 0, $dst_w, $dst_h, $base_w+$pad*2, $base_h+$pad*2);
    imagedestroy($tmp);
}

// Mapa de tamaño px → escala GD
function px_to_gd_scale($px) {
    // Fuente GD 5 tiene ~15px de alto base; escalar desde ahí
    $base_size = 5;
    $base_px   = 15;
    $scale = max(1, round($px / $base_px));
    return [$base_size, $scale];
}

$white   = imagecolorallocate($canvas, 255, 255, 255);
$acc_c   = imagecolorallocate($canvas, $ar, $ag, $ab);
$acc2_c  = imagecolorallocate($canvas, $a2r, $a2g, $a2b);
$shadow  = imagecolorallocatealpha($canvas, 0, 0, 0, 70);
$dim     = imagecolorallocate($canvas, 130, 130, 140);

// Tamaños de texto desde parámetros (px)
// fs1,fs2,fs3 ya están definidos arriba como $fs1,$fs2,$fs3
[$gd1, $sc1] = px_to_gd_scale($fs1);
[$gd2, $sc2] = px_to_gd_scale($fs2);
[$gd3, $sc3] = px_to_gd_scale($fs3);

// Altura real de cada bloque
$h1 = (int)(imagefontheight($gd1) * $sc1);
$h2 = (int)(imagefontheight($gd2) * $sc2);
$h3 = (int)(imagefontheight($gd3) * $sc3);

// Zona de texto: a la derecha del avatar
$text_x_start = $av_cx + $radius + 40;
$text_zone_w  = $w - $text_x_start - 40;
if ($text_x_start > $w * 0.7) $text_x_start = 60;

// Calcular posición Y central según alturas reales
$text_block_h = $h3 + 10 + $h1 + 14 + $h2 + 30 + 30;
$text_y_base  = (int)(($h / 2) - ($text_block_h / 2));
if ($text_y_base < 20) $text_y_base = 20;

// Línea acento decorativa
imageline($canvas, $text_x_start, $text_y_base - 14, $text_x_start + 50, $text_y_base - 14, $acc_c);

// SUB-TEXTO
if (!empty($sub)) {
    $sub_up = strtoupper($sub);
    ds_text_scaled($canvas, $gd3, $text_x_start, $text_y_base, $sub_up, $acc2_c, $sc3, $shadow);
}
$text_y_base += $h3 + 10;

// T1 — TEXTO PRINCIPAL (escalado)
if (!empty($texto1)) {
    $t1_up = strtoupper($texto1);
    // Render múltiple para simular bold
    for($thick = 0; $thick < min(3, $sc1); $thick++) {
        ds_text_scaled($canvas, $gd1, $text_x_start + $thick, $text_y_base + $thick, $t1_up, $white, $sc1, $shadow);
    }
    // Línea bajo T1
    $hl_len = min(strlen($t1_up) * imagefontwidth($gd1) * $sc1, $text_zone_w);
    $hl_c   = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 90);
    imageline($canvas, $text_x_start, $text_y_base + $h1 + 4, $text_x_start + (int)$hl_len, $text_y_base + $h1 + 4, $hl_c);
}
$text_y_base += $h1 + 16;

// T2 — TEXTO SECUNDARIO
if (!empty($texto2)) {
    $t2_up = strtoupper($texto2);
    ds_text_scaled($canvas, $gd2, $text_x_start, $text_y_base, $t2_up, $acc_c, $sc2, $shadow);
}
$text_y_base += $h2 + 16;

// Separador
$sep_c = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 70);
imageline($canvas, $text_x_start, $text_y_base, $text_x_start + 80, $text_y_base, $sep_c);
$text_y_base += 20;

// Preset name pequeño
$pname = $cfg['name'] ?? '';
imagestring($canvas, 1, $text_x_start, $text_y_base, "STYLE: $pname · #{$estilo}", $dim);

// === BADGE ===
if (!empty($badge_text)) {
    $badge_up = strtoupper($badge_text);
    $badge_pad = 12;
    $badge_w2 = strlen($badge_up) * 8 + $badge_pad * 2;
    $badge_h2 = 24;
    $badge_bx = $w - $badge_w2 - 30;
    $badge_by = 28;
    $badge_bg = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 40);
    imagefilledrectangle($canvas, $badge_bx, $badge_by, $badge_bx+$badge_w2, $badge_by+$badge_h2, $badge_bg);
    imagerectangle($canvas, $badge_bx, $badge_by, $badge_bx+$badge_w2, $badge_by+$badge_h2, $acc_c);
    ds_text($canvas, 2, $badge_bx + $badge_pad, $badge_by + 5, $badge_up, $white);
}

// === WATERMARK ===
if (!empty($watermark)) {
    $wm_col = imagecolorallocatealpha($canvas, 255, 255, 255, 100);
    ds_text($canvas, 1, $w - strlen($watermark)*6 - 16, $h - 18, $watermark, $wm_col);
}

// === SALIDA ===
header('Cache-Control: public, max-age=86400');
header('X-Banner-Style: ' . $estilo);
header('X-Banner-Preset: ' . ($cfg['name'] ?? 'unknown'));

if ($output_format === 'jpeg') {
    header('Content-Type: image/jpeg');
    imagejpeg($canvas, null, $quality);
} else {
    header('Content-Type: image/png');
    imagepng($canvas);
}
imagedestroy($canvas);
?>

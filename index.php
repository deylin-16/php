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
$radius    = min(300, max(50, (int)($_GET['r']   ?? 200)));  // Radio del avatar
$avatar_x  = min(90,  max(10, (int)($_GET['ax']  ?? 15)));   // Posición X avatar %
$avatar_y  = min(90,  max(10, (int)($_GET['ay']  ?? 50)));   // Posición Y avatar %
$show_particles = ($_GET['particles'] ?? '1') !== '0';
$show_lines     = ($_GET['lines']     ?? '1') !== '0';
$show_glitch    = ($_GET['glitch']    ?? '0') === '1';
$show_scanlines = ($_GET['scanlines'] ?? '0') === '1';
$show_noise     = ($_GET['noise']     ?? '1') !== '0';
$show_grid      = ($_GET['grid']      ?? '0') === '1';
$badge_text     = urldecode($_GET['badge'] ?? '');
$watermark      = urldecode($_GET['wm']    ?? 'deylin.systems');
$output_format  = strtolower($_GET['fmt']  ?? 'png'); // png | jpeg | webp
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
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Bebas+Neue&family=DM+Sans:wght@300;400;600&display=swap" rel="stylesheet">
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
          <img id="preview-img" src="" alt="Preview" loading="lazy">
        </div>
        <div style="margin-top:14px;display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-primary" onclick="copyApiUrl()">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
            Copiar URL API
          </button>
          <button class="btn btn-secondary" onclick="openRaw()">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            Ver Raw
          </button>
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

      <!-- Textos -->
      <div class="glass glass-sm">
        <div class="section-title">TEXTOS</div>
        <div class="field-group">
          <label>TEXTO PRINCIPAL (t1)</label>
          <input type="text" id="i-t1" value="DEYLIN SYSTEMS" oninput="updatePreview()">
        </div>
        <div class="field-group">
          <label>TEXTO SECUNDARIO (t2)</label>
          <input type="text" id="i-t2" value="PREMIUM BANNER LAB" oninput="updatePreview()">
        </div>
        <div class="field-group">
          <label>SUB-TEXTO (sub)</label>
          <input type="text" id="i-sub" value="ENGINE V5.0" oninput="updatePreview()">
        </div>
        <div class="field-group">
          <label>BADGE / ETIQUETA</label>
          <input type="text" id="i-badge" placeholder="ej: NUEVO · LIVE · VIP" oninput="updatePreview()">
        </div>
        <div class="field-group">
          <label>WATERMARK</label>
          <input type="text" id="i-wm" value="deylin.systems" oninput="updatePreview()">
        </div>
      </div>

      <!-- Dimensiones -->
      <div class="glass glass-sm">
        <div class="section-title">DIMENSIONES</div>
        <div class="row-2">
          <div class="field-group">
            <label>ANCHO (w)</label>
            <input type="number" id="i-w" value="1200" min="400" max="2400" step="50" oninput="updatePreview()">
          </div>
          <div class="field-group">
            <label>ALTO (h)</label>
            <input type="number" id="i-h" value="600" min="200" max="1200" step="50" oninput="updatePreview()">
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
          <input type="url" id="i-logo" placeholder="https://..." oninput="updatePreview()">
        </div>
        <div class="field-group">
          <label>RADIO (r): <span id="lbl-r">200</span>px</label>
          <input type="range" id="i-r" min="50" max="300" value="200" oninput="document.getElementById('lbl-r').textContent=this.value;updatePreview()">
        </div>
        <div class="row-2">
          <div class="field-group">
            <label>POS X (ax): <span id="lbl-ax">15</span>%</label>
            <input type="range" id="i-ax" min="10" max="90" value="15" oninput="document.getElementById('lbl-ax').textContent=this.value;updatePreview()">
          </div>
          <div class="field-group">
            <label>POS Y (ay): <span id="lbl-ay">50</span>%</label>
            <input type="range" id="i-ay" min="10" max="90" value="50" oninput="document.getElementById('lbl-ay').textContent=this.value;updatePreview()">
          </div>
        </div>
      </div>

      <!-- Efectos -->
      <div class="glass glass-sm">
        <div class="section-title">EFECTOS VISUALES</div>
        <div class="toggle-row">
          <span class="toggle-label">✦ Partículas</span>
          <label class="toggle"><input type="checkbox" id="e-particles" checked onchange="updatePreview()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⟋ Líneas decorativas</span>
          <label class="toggle"><input type="checkbox" id="e-lines" checked onchange="updatePreview()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">▒ Noise / Grain</span>
          <label class="toggle"><input type="checkbox" id="e-noise" checked onchange="updatePreview()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⊞ Grid de fondo</span>
          <label class="toggle"><input type="checkbox" id="e-grid" onchange="updatePreview()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">▬ Scanlines</span>
          <label class="toggle"><input type="checkbox" id="e-scanlines" onchange="updatePreview()"><div class="toggle-slider"></div></label>
        </div>
        <div class="toggle-row">
          <span class="toggle-label">⚡ Efecto Glitch</span>
          <label class="toggle"><input type="checkbox" id="e-glitch" onchange="updatePreview()"><div class="toggle-slider"></div></label>
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
          <button class="btn btn-secondary" style="flex:1" onclick="downloadImg()">⬇ Descargar</button>
          <button class="btn btn-danger" onclick="resetAll()">↺ Reset</button>
        </div>
        <div style="margin-top:10px">
          <div class="field-group">
            <label>CALIDAD JPEG (q)</label>
            <input type="range" id="i-q" min="10" max="100" value="90" oninput="updatePreview()">
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
// STYLE PRESETS DATA (para renderizar las tarjetas)
// ============================================================
const PRESETS = [
  {id:1,  name:'Violet Luxe',    bg:'#0a0a1a', acc:'#a855f7'},
  {id:2,  name:'Cyber Neon',     bg:'#141414', acc:'#00ff96'},
  {id:3,  name:'Synthwave',      bg:'#280028', acc:'#ff1493'},
  {id:4,  name:'Deep Blue',      bg:'#0f0f23', acc:'#0096ff'},
  {id:5,  name:'Blood Red',      bg:'#190a0a', acc:'#ff2d2d'},
  {id:6,  name:'Acid Green',     bg:'#0a1e0a', acc:'#adff2f'},
  {id:7,  name:'Luxury Gold',    bg:'#000000', acc:'#ffd700'},
  {id:8,  name:'White Studio',   bg:'#1e1e32', acc:'#ffffff'},
  {id:9,  name:'Pink Shadow',    bg:'#0a0a0a', acc:'#ec4899'},
  {id:10, name:'Coral Night',    bg:'#191919', acc:'#ff7f50'},
  {id:11, name:'Ice Glacier',    bg:'#060c14', acc:'#00cfff'},
  {id:12, name:'Ember',          bg:'#1a0800', acc:'#ff5e00'},
  {id:13, name:'Lavender Mist',  bg:'#0d0814', acc:'#c084fc'},
  {id:14, name:'Teal Matrix',    bg:'#020f0e', acc:'#00e5c8'},
  {id:15, name:'Rose Gold',      bg:'#1a0f0f', acc:'#f4a1a1'},
  {id:16, name:'Solar Flare',    bg:'#0f0800', acc:'#fbbf24'},
  {id:17, name:'Ultraviolet',    bg:'#07010f', acc:'#8b5cf6'},
  {id:18, name:'Mercury',        bg:'#0d0d0d', acc:'#e0e0e0'},
  {id:19, name:'Abyssal',        bg:'#000508', acc:'#065f46'},
  {id:20, name:'Hologram',       bg:'#050010', acc:'#7fdbff'},
];

let currentStyle = 1;
let currentFmt   = 'png';

// Render style cards
const grid = document.getElementById('style-grid');
PRESETS.forEach(p => {
  const d = document.createElement('div');
  d.className = 'style-card';
  d.id = `sc-${p.id}`;
  d.innerHTML = `
    <div class="swatch" style="background:linear-gradient(135deg,${p.bg},${p.acc})"></div>
    <div class="num">#${String(p.id).padStart(2,'0')}</div>
    <div class="name">${p.name}</div>`;
  d.onclick = () => changeStyle(p.id);
  grid.appendChild(d);
});
document.getElementById('sc-1').classList.add('active');

function changeStyle(id) {
  document.querySelectorAll('.style-card').forEach(c => c.classList.remove('active'));
  document.getElementById(`sc-${id}`)?.classList.add('active');
  currentStyle = id;
  updatePreview();
}

function buildUrl() {
  const logo    = document.getElementById('i-logo').value   || '<?= $img_predeterminada ?>';
  const t1      = encodeURIComponent(document.getElementById('i-t1').value);
  const t2      = encodeURIComponent(document.getElementById('i-t2').value);
  const sub     = encodeURIComponent(document.getElementById('i-sub').value);
  const badge   = encodeURIComponent(document.getElementById('i-badge').value);
  const wm      = encodeURIComponent(document.getElementById('i-wm').value);
  const w       = document.getElementById('i-w').value;
  const h       = document.getElementById('i-h').value;
  const r       = document.getElementById('i-r').value;
  const ax      = document.getElementById('i-ax').value;
  const ay      = document.getElementById('i-ay').value;
  const q       = document.getElementById('i-q').value;
  const particles = document.getElementById('e-particles').checked ? 1 : 0;
  const lines   = document.getElementById('e-lines').checked ? 1 : 0;
  const noise   = document.getElementById('e-noise').checked ? 1 : 0;
  const grid    = document.getElementById('e-grid').checked ? 1 : 0;
  const scanlines = document.getElementById('e-scanlines').checked ? 1 : 0;
  const glitch  = document.getElementById('e-glitch').checked ? 1 : 0;

  const base = window.location.pathname;
  const params = new URLSearchParams({
    logo, estilo: currentStyle, t1, t2, sub, badge, wm,
    w, h, r, ax, ay, particles, lines, noise, grid, scanlines, glitch,
    fmt: currentFmt, q
  });
  return `${base}?${params.toString()}`;
}

let debounceTimer;
function updatePreview() {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(() => {
    const url = buildUrl();
    const img = document.getElementById('preview-img');
    img.classList.add('loading');
    img.onload  = () => img.classList.remove('loading');
    img.onerror = () => img.classList.remove('loading');
    img.src = url;
    document.getElementById('url-output').textContent = url;

    // Count non-default params
    const sp = new URLSearchParams(url.split('?')[1]);
    document.getElementById('req-counter').textContent = `PARÁMETROS: ${sp.size}`;
  }, 400);
}

function copyApiUrl() {
  const url = buildUrl();
  navigator.clipboard.writeText(window.location.origin + url);
  showToast('✓ URL copiada al portapapeles');
}
function openRaw() { window.open(buildUrl(), '_blank'); }

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
  updatePreview();
}

function setSize(w, h) {
  document.getElementById('i-w').value = w;
  document.getElementById('i-h').value = h;
  updatePreview();
}

function resetAll() {
  document.getElementById('i-t1').value = 'DEYLIN SYSTEMS';
  document.getElementById('i-t2').value = 'PREMIUM BANNER LAB';
  document.getElementById('i-sub').value = 'ENGINE V5.0';
  document.getElementById('i-badge').value = '';
  document.getElementById('i-wm').value = 'deylin.systems';
  document.getElementById('i-w').value = 1200;
  document.getElementById('i-h').value = 600;
  document.getElementById('i-r').value = 200;
  document.getElementById('i-ax').value = 15;
  document.getElementById('i-ay').value = 50;
  document.getElementById('lbl-r').textContent = 200;
  document.getElementById('lbl-ax').textContent = 15;
  document.getElementById('lbl-ay').textContent = 50;
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
    document.getElementById(`tab-${t}`).style.display = t === name ? '' : 'none';
  });
  document.querySelectorAll('.tab').forEach((t,i) => {
    t.classList.toggle('active', ['params','examples','integrations'][i] === name);
  });
}

// Init
updatePreview();
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

// === TEXTOS ===
// Helper para centrar/posicionar texto con imagestring (sin FreeType)
function ds_text($canvas, $size_gd, $x, $y, $text, $color, $shadow_color=null, $shadow_offset=2) {
    if($shadow_color) {
        imagestring($canvas, $size_gd, $x+$shadow_offset, $y+$shadow_offset, $text, $shadow_color);
    }
    imagestring($canvas, $size_gd, $x, $y, $text, $color);
}

$white   = imagecolorallocate($canvas, 255, 255, 255);
$acc_c   = imagecolorallocate($canvas, $ar, $ag, $ab);
$acc2_c  = imagecolorallocate($canvas, $a2r, $a2g, $a2b);
$shadow  = imagecolorallocatealpha($canvas, 0, 0, 0, 70);
$dim     = imagecolorallocate($canvas, 130, 130, 140);

// Zona de texto: a la derecha del avatar
$text_x_start = $av_cx + $radius + 40;
$text_zone_w  = $w - $text_x_start - 40;

// Si el avatar está muy a la derecha, ponemos texto a la izquierda
if ($text_x_start > $w * 0.7) {
    $text_x_start = 60;
}

// Calcular posición Y central de texto
$text_block_h = 140; // altura aproximada del bloque de texto
$text_y_base  = ($h / 2) - ($text_block_h / 2);

// Línea decorativa antes del texto principal
$line_col = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 60);
imageline($canvas, $text_x_start, (int)$text_y_base - 10, $text_x_start + 60, (int)$text_y_base - 10, $acc_c);

// Preset name / sub-texto pequeño arriba
if (!empty($sub)) {
    $sub_up = strtoupper($sub);
    ds_text($canvas, 2, (int)$text_x_start, (int)$text_y_base, $sub_up, $acc2_c, $shadow);
}
$text_y_base += 20;

// t1 — texto principal (grande, repetido para simular bold)
if (!empty($texto1)) {
    $t1_up = strtoupper($texto1);
    // Multi-render para grosor
    for($thick=0; $thick<2; $thick++) {
        ds_text($canvas, 5, (int)$text_x_start + $thick, (int)$text_y_base + $thick, $t1_up, $white, $shadow, 3);
    }
    // Línea de highlight
    $hl_len = min(strlen($t1_up) * 9, (int)$text_zone_w);
    $hl_c   = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 90);
    imageline($canvas, (int)$text_x_start, (int)($text_y_base + 22), (int)($text_x_start + $hl_len), (int)($text_y_base + 22), $hl_c);
}
$text_y_base += 38;

// t2 — texto secundario
if (!empty($texto2)) {
    $t2_up = strtoupper($texto2);
    ds_text($canvas, 3, (int)$text_x_start, (int)$text_y_base, $t2_up, $acc_c, $shadow);
}
$text_y_base += 30;

// Separador
$sep_c = imagecolorallocatealpha($canvas, $ar, $ag, $ab, 70);
imageline($canvas, (int)$text_x_start, (int)$text_y_base, (int)($text_x_start + 80), (int)$text_y_base, $sep_c);
$text_y_base += 20;

// Preset name
$pname = $cfg['name'] ?? '';
ds_text($canvas, 1, (int)$text_x_start, (int)$text_y_base, "STYLE: $pname · #{$estilo}", $dim);

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

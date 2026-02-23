<?php
error_reporting(0);
ini_set('display_errors', 0);

$url_logo    = $_GET['logo']   ?? '';
$estilo      = max(1, min(10, (int)($_GET['estilo'] ?? 1)));
$img_default = "https://ik.imagekit.io/pm10ywrf6f/bot_by_deylin/1769830823123_e336030d2dfd15b3f2a9bec8d30e15f3_YZEsD9KKM.jpg";

// ════════════════════════════════════════════════════════════
//   DASHBOARD  —  aparece solo si no viene ?logo=
// ════════════════════════════════════════════════════════════
if (empty($url_logo)) {

$styles_meta = [
    1  => ['name'=>'PRIDE WAVE',      'badge'=>'SUPER PRIDE',  'pal'=>['#FF0018','#FF8C00','#FFED00','#008026','#004DFF','#750787']],
    2  => ['name'=>'BISEXUAL NEON',   'badge'=>'BI QUEEN',     'pal'=>['#D60270','#D60270','#9B4F96','#0038A8','#0038A8']],
    3  => ['name'=>'RAINBOW FIRE',    'badge'=>'MEGA GAY',     'pal'=>['#750787','#004DFF','#008026','#FFED00','#FF8C00','#FF0018']],
    4  => ['name'=>'TRANS CIELO',     'badge'=>'TRANS ICON',   'pal'=>['#55CDFC','#F7A8B8','#FFFFFF','#F7A8B8','#55CDFC']],
    5  => ['name'=>'QUEER VOLTAJE',   'badge'=>'QUEER ENERGY', 'pal'=>['#00ff88','#004DFF','#750787','#D60270','#FF8C00']],
    6  => ['name'=>'LESBIAN SUNSET',  'badge'=>'LESBI LEGEND', 'pal'=>['#D62900','#FF9B55','#FFFFFF','#D461A6','#A50062']],
    7  => ['name'=>'DARK PRIDE',      'badge'=>'SHADOW QUEEN', 'pal'=>['#2D0037','#750787','#004DFF','#008026','#FF0018']],
    8  => ['name'=>'GLITTER QUEEN',   'badge'=>'GLITTER ICON', 'pal'=>['#FF85E5','#D460D4','#FFFFFF','#D460D4','#FF85E5']],
    9  => ['name'=>'PROGRESS',        'badge'=>'ALLY AWARD',   'pal'=>['#000000','#784F17','#FF0018','#FF8C00','#FFED00','#008026','#004DFF','#750787']],
    10 => ['name'=>'ROYAL PRIDE',     'badge'=>'CROWN ROYAL',  'pal'=>['#FFD700','#FF8C00','#750787','#004DFF','#008026']],
];

?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Deylin Systems · Pride Banner Lab</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Syne+Mono&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#080A0F; --s1:#0E1118; --s2:#141820;
  --brd:rgba(255,255,255,.07); --t1:#FFFFFF;
  --t2:rgba(255,255,255,.45); --t3:rgba(255,255,255,.18);
  --mono:'Syne Mono',monospace; --sans:'Syne',sans-serif;
}
html,body{height:100%;background:var(--bg);color:var(--t1);font-family:var(--sans);overflow-x:hidden}

/* LAYOUT */
.layout{
  display:grid;
  grid-template-columns:1fr 380px;
  grid-template-rows:auto 1fr auto;
  grid-template-areas:"hd hd""pv sb""ft ft";
  min-height:100vh;max-width:1400px;margin:0 auto;padding:0 32px;
}

/* HEADER */
header{
  grid-area:hd;display:flex;align-items:center;justify-content:space-between;
  padding:28px 0 24px;border-bottom:1px solid var(--brd);
}
.logo-mark{font-size:15px;font-weight:800;letter-spacing:3px;text-transform:uppercase}
.logo-mark em{color:var(--t3);font-style:normal}
.hpills{display:flex;gap:8px}
.pill{padding:5px 14px;border-radius:100px;border:1px solid var(--brd);
  font-family:var(--mono);font-size:10px;letter-spacing:1.5px;color:var(--t2)}
.pill.live{color:#4ade80;border-color:rgba(74,222,128,.2)}

/* PREVIEW */
.preview-area{grid-area:pv;padding:36px 36px 36px 0;display:flex;flex-direction:column;gap:18px}
.lbl{font-family:var(--mono);font-size:10px;letter-spacing:3px;color:var(--t3);text-transform:uppercase}

.preview-wrap{position:relative;border-radius:18px;overflow:hidden;
  background:var(--s1);border:1px solid var(--brd);aspect-ratio:2/1}
.preview-wrap img{width:100%;height:100%;object-fit:cover;display:block;
  transition:opacity .4s,transform .5s cubic-bezier(.23,1,.32,1)}
.preview-wrap.loading img{opacity:.25;transform:scale(.97)}
.loader{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
  font-family:var(--mono);font-size:11px;letter-spacing:3px;color:var(--t3);
  opacity:0;pointer-events:none;transition:opacity .3s}
.preview-wrap.loading .loader{opacity:1}

.action-bar{display:flex;gap:10px}
.btn{padding:12px 22px;border-radius:11px;border:none;
  font-family:var(--mono);font-size:11px;letter-spacing:2px;text-transform:uppercase;
  cursor:pointer;transition:all .25s ease}
.btn-copy{flex:1;background:var(--t1);color:#000;font-weight:700}
.btn-copy:hover{background:rgba(255,255,255,.85);transform:translateY(-2px)}
.btn-sm{background:var(--s2);color:var(--t2);border:1px solid var(--brd)}
.btn-sm:hover{background:var(--s1);color:var(--t1)}

.url-row{display:flex;gap:10px;padding:16px 18px;background:var(--s1);
  border-radius:14px;border:1px solid var(--brd)}
.url-row input{flex:1;background:transparent;border:none;outline:none;
  font-family:var(--mono);font-size:11px;color:var(--t1);letter-spacing:.5px}
.url-row input::placeholder{color:var(--t3)}
.url-row button{padding:8px 16px;background:var(--s2);border:1px solid var(--brd);
  border-radius:8px;color:var(--t2);font-family:var(--mono);font-size:11px;
  cursor:pointer;transition:all .2s;letter-spacing:1px}
.url-row button:hover{background:var(--t1);color:#000;border-color:var(--t1)}

.endpoint-box{padding:14px 18px;background:var(--s1);border-radius:14px;
  border:1px solid var(--brd);font-family:var(--mono);font-size:10px;
  color:var(--t3);letter-spacing:.5px;word-break:break-all;line-height:1.8}
.endpoint-box strong{color:var(--t2);display:block;margin-bottom:4px}
#epUrl{color:rgba(255,255,255,.55)}

/* SIDEBAR */
.sidebar{grid-area:sb;padding:36px 0 36px 28px;border-left:1px solid var(--brd);
  display:flex;flex-direction:column;gap:16px}
.sidebar-title{font-size:24px;font-weight:800;letter-spacing:-0.5px}
.sidebar-sub{font-family:var(--mono);font-size:10px;letter-spacing:2.5px;
  color:var(--t3);text-transform:uppercase;margin-top:4px}

.styles-grid{display:flex;flex-direction:column;gap:8px;overflow-y:auto;flex:1;padding-right:4px}
.styles-grid::-webkit-scrollbar{width:2px}
.styles-grid::-webkit-scrollbar-thumb{background:var(--brd);border-radius:4px}

.sc{display:flex;align-items:center;gap:12px;padding:12px 14px;
  background:var(--s1);border-radius:12px;border:1px solid var(--brd);
  cursor:pointer;transition:all .25s cubic-bezier(.23,1,.32,1);position:relative}
.sc:hover{border-color:rgba(255,255,255,.18);transform:translateX(5px)}
.sc.active{background:var(--t1);border-color:var(--t1)}
.sc.active .sc-name{color:#000}
.sc.active .sc-badge,.sc.active .sc-num,.sc.active .sc-arrow{color:rgba(0,0,0,.35)}

.sc-swatch{width:38px;height:38px;border-radius:8px;overflow:hidden;
  display:flex;flex-direction:column;flex-shrink:0}
.sc-swatch-row{flex:1}
.sc-info{flex:1}
.sc-name{font-size:13px;font-weight:700;letter-spacing:.3px}
.sc-badge{font-family:var(--mono);font-size:9px;letter-spacing:1.5px;color:var(--t3);margin-top:3px}
.sc-num{font-family:var(--mono);font-size:10px;color:var(--t3);min-width:22px;text-align:right}
.sc-arrow{font-size:18px;color:var(--t3);transition:transform .2s}
.sc:hover .sc-arrow,.sc.active .sc-arrow{transform:translateX(3px)}

/* FOOTER */
footer{grid-area:ft;display:flex;align-items:center;justify-content:space-between;
  padding:20px 0;border-top:1px solid var(--brd);
  font-family:var(--mono);font-size:10px;color:var(--t3);letter-spacing:1.5px}

/* TOAST */
.toast{position:fixed;bottom:28px;left:50%;
  transform:translateX(-50%) translateY(80px);
  background:var(--t1);color:#000;padding:13px 28px;border-radius:100px;
  font-family:var(--mono);font-size:11px;letter-spacing:2px;
  z-index:9999;transition:transform .4s cubic-bezier(.23,1,.32,1);white-space:nowrap}
.toast.show{transform:translateX(-50%) translateY(0)}

@media(max-width:860px){
  .layout{grid-template-columns:1fr;grid-template-areas:"hd""pv""sb""ft";padding:0 16px}
  .sidebar{border-left:none;border-top:1px solid var(--brd);padding:28px 0 0}
  .preview-area{padding:28px 0}
}
</style>
</head>
<body>
<div class="layout">

  <header>
    <div class="logo-mark">DEYLIN <em>SYSTEMS</em></div>
    <div class="hpills">
      <div class="pill">PRIDE BANNER LAB</div>
      <div class="pill">GD ENGINE</div>
      <div class="pill live">● ONLINE</div>
    </div>
  </header>

  <main class="preview-area">
    <div class="lbl">Live Preview</div>
    <div class="preview-wrap" id="pw">
      <img id="pi" src="?logo=<?=urlencode($img_default)?>&estilo=1" alt="preview">
      <div class="loader">GENERANDO IMAGEN…</div>
    </div>

    <div class="action-bar">
      <button class="btn btn-copy" onclick="copyEP()">↗ COPIAR URL DE LA API</button>
      <button class="btn btn-sm" onclick="openRaw()">RAW</button>
      <button class="btn btn-sm" onclick="dlImg()">⬇</button>
    </div>

    <div class="lbl">URL del logo</div>
    <div class="url-row">
      <input type="text" id="logoUrl" placeholder="https://tu-imagen.com/logo.png"
             value="<?=htmlspecialchars($img_default)?>">
      <button onclick="loadLogo()">CARGAR</button>
    </div>

    <div class="endpoint-box">
      <strong>ENDPOINT API</strong>
      <span id="epUrl"></span>
    </div>
  </main>

  <aside class="sidebar">
    <div>
      <div class="sidebar-title">Estilos</div>
      <div class="sidebar-sub">10 presets · pride edition</div>
    </div>
    <div class="styles-grid" id="sl">
    <?php foreach($styles_meta as $id=>$m): ?>
      <div class="sc <?=$id===1?'active':''?>" id="sc<?=$id?>" onclick="pick(<?=$id?>)">
        <div class="sc-swatch">
          <?php foreach($m['pal'] as $hx): ?>
          <div class="sc-swatch-row" style="background:<?=$hx?>"></div>
          <?php endforeach; ?>
        </div>
        <div class="sc-info">
          <div class="sc-name"><?=$m['name']?></div>
          <div class="sc-badge"><?=$m['badge']?></div>
        </div>
        <span class="sc-num"><?=str_pad($id,2,'0',STR_PAD_LEFT)?></span>
        <span class="sc-arrow">›</span>
      </div>
    <?php endforeach; ?>
    </div>
  </aside>

  <footer>
    <span>BY DEYLIN © 2026</span>
    <span>LOVE IS LOVE · PRIDE FOREVER</span>
    <span>V4.1 · STABLE</span>
  </footer>
</div>
<div class="toast" id="toast"></div>

<script>
let cur=1, logo=document.getElementById('logoUrl').value;
const base=location.href.split('?')[0];

function url(l,s){return `${base}?logo=${encodeURIComponent(l)}&estilo=${s}`}
function updateEP(){document.getElementById('epUrl').textContent=url(logo,cur)}

function pick(id){
  cur=id;
  document.querySelectorAll('.sc').forEach(c=>c.classList.remove('active'));
  document.getElementById('sc'+id).classList.add('active');
  refresh();
}
function refresh(){
  const pw=document.getElementById('pw'),img=document.getElementById('pi');
  pw.classList.add('loading');
  const t=new Image();
  t.onload=()=>{img.src=url(logo,cur);pw.classList.remove('loading');updateEP()};
  t.onerror=()=>pw.classList.remove('loading');
  t.src=url(logo,cur);
}
function loadLogo(){
  const v=document.getElementById('logoUrl').value.trim();
  if(!v)return;logo=v;refresh();
}
function copyEP(){
  navigator.clipboard.writeText(url(logo,cur)).then(()=>toast('URL COPIADA ✓'));
}
function openRaw(){window.open(url(logo,cur))}
function dlImg(){const a=document.createElement('a');a.href=url(logo,cur);a.download=`pride_s${cur}.png`;a.click()}
function toast(msg){const t=document.getElementById('toast');t.textContent=msg;t.classList.add('show');setTimeout(()=>t.classList.remove('show'),2500)}

document.addEventListener('keydown',e=>{
  if(e.target.tagName==='INPUT')return;
  const n=e.key==='0'?10:parseInt(e.key);
  if(n>=1&&n<=10)pick(n);
});
document.getElementById('logoUrl').addEventListener('keydown',e=>{if(e.key==='Enter')loadLogo()});
updateEP();
</script>
</body>
</html>
<?php
exit;
}

// ════════════════════════════════════════════════════════════════════
//   API DE IMAGEN — genera PNG
// ════════════════════════════════════════════════════════════════════

$W=1200; $H=600;
$canvas=imagecreatetruecolor($W,$H);
imagealphablending($canvas,true);
imagesavealpha($canvas,true);

// ── PALETA ────────────────────────────────────────────────────────
$P=[
  'red'      =>[255,  0, 24], 'orange'  =>[255,140,  0],
  'yellow'   =>[255,237,  0], 'green'   =>[  0,128, 38],
  'blue'     =>[  0, 77,255], 'violet'  =>[117,  7,135],
  'transpink'=>[247,168,184], 'transblue'=>[85,205,252],
  'white'    =>[255,255,255], 'black'   =>[  0,  0,  0],
  'bipink'   =>[214,  2,112], 'bipurple'=>[155, 79,150],
  'biblue'   =>[  0, 56,168], 'lesbred' =>[214, 41,  0],
  'lesboran' =>[255,155, 85], 'lesbpink'=>[212, 97,166],
  'lesbdpink'=>[165,  0, 98], 'gold'    =>[255,215,  0],
  'brown'    =>[120, 79, 23], 'glpink'  =>[255,133,229],
  'glpurp'   =>[212, 96,212],
];

// ── PRESETS ───────────────────────────────────────────────────────
$presets=[
  1 =>['st'=>['red','orange','yellow','green','blue','violet'],
       'bg'=>[8,5,18],'ac'=>[200,80,255],
       'bd'=>'SUPER PRIDE','bb'=>[200,0,80],'bf'=>[255,255,255],'nm'=>'PRIDE WAVE'],
  2 =>['st'=>['bipink','bipink','bipurple','biblue','biblue'],
       'bg'=>[10,5,28],'ac'=>[214,2,112],
       'bd'=>'BI QUEEN','bb'=>[155,79,150],'bf'=>[255,255,255],'nm'=>'BISEXUAL NEON'],
  3 =>['st'=>['violet','blue','green','yellow','orange','red'],
       'bg'=>[5,0,0],'ac'=>[255,80,0],
       'bd'=>'MEGA GAY','bb'=>[220,40,0],'bf'=>[255,255,0],'nm'=>'RAINBOW FIRE'],
  4 =>['st'=>['transblue','transblue','transpink','transpink','white','transpink','transpink','transblue','transblue'],
       'bg'=>[8,18,38],'ac'=>[85,205,252],
       'bd'=>'TRANS ICON','bb'=>[85,205,252],'bf'=>[0,30,80],'nm'=>'TRANS CIELO'],
  5 =>['st'=>['green','blue','violet','bipink','orange'],
       'bg'=>[0,5,0],'ac'=>[0,255,100],
       'bd'=>'QUEER ENERGY','bb'=>[0,180,70],'bf'=>[0,20,0],'nm'=>'QUEER VOLTAJE'],
  6 =>['st'=>['lesbred','lesboran','white','lesbpink','lesbdpink'],
       'bg'=>[25,5,10],'ac'=>[214,41,0],
       'bd'=>'LESBI LEGEND','bb'=>[165,0,98],'bf'=>[255,255,255],'nm'=>'LESBIAN SUNSET'],
  7 =>['st'=>['black','violet','blue','green','yellow','orange','red'],
       'bg'=>[4,4,4],'ac'=>[150,50,200],
       'bd'=>'SHADOW QUEEN','bb'=>[40,0,60],'bf'=>[200,150,255],'nm'=>'DARK PRIDE'],
  8 =>['st'=>['glpink','glpurp','white','glpurp','glpink'],
       'bg'=>[20,5,30],'ac'=>[255,100,255],
       'bd'=>'GLITTER ICON','bb'=>[230,60,200],'bf'=>[255,255,255],'nm'=>'GLITTER QUEEN'],
  9 =>['st'=>['black','brown','transblue','transpink','white','red','orange','yellow','green','blue','violet'],
       'bg'=>[6,6,6],'ac'=>[255,255,255],
       'bd'=>'ALLY AWARD','bb'=>[255,255,255],'bf'=>[0,0,0],'nm'=>'PROGRESS'],
  10=>['st'=>['gold','orange','violet','blue','green'],
       'bg'=>[10,8,2],'ac'=>[255,215,0],
       'bd'=>'CROWN ROYAL','bb'=>[220,180,0],'bf'=>[0,0,0],'nm'=>'ROYAL PRIDE'],
];

$cfg=$presets[$estilo];

// ── HELPERS ───────────────────────────────────────────────────────
function c($img,$r,$g,$b,$a=-1){
    return $a<0?imagecolorallocate($img,$r,$g,$b):imagecolorallocatealpha($img,$r,$g,$b,$a);
}
function rgb($key,&$P){return $P[$key]??[255,255,255];}

function fillrect($img,$x1,$y1,$x2,$y2,$r,$col){
    $r=min($r,abs($x2-$x1)/2,abs($y2-$y1)/2);
    imagefilledrectangle($img,$x1+$r,$y1,$x2-$r,$y2,$col);
    imagefilledrectangle($img,$x1,$y1+$r,$x2,$y2-$r,$col);
    imagefilledellipse($img,$x1+$r,$y1+$r,$r*2,$r*2,$col);
    imagefilledellipse($img,$x2-$r,$y1+$r,$r*2,$r*2,$col);
    imagefilledellipse($img,$x1+$r,$y2-$r,$r*2,$r*2,$col);
    imagefilledellipse($img,$x2-$r,$y2-$r,$r*2,$r*2,$col);
}
function strokerect($img,$x1,$y1,$x2,$y2,$r,$col){
    $r=max(1,min($r,abs($x2-$x1)/2,abs($y2-$y1)/2));
    imageline($img,$x1+$r,$y1,$x2-$r,$y1,$col);
    imageline($img,$x1+$r,$y2,$x2-$r,$y2,$col);
    imageline($img,$x1,$y1+$r,$x1,$y2-$r,$col);
    imageline($img,$x2,$y1+$r,$x2,$y2-$r,$col);
    imagearc($img,$x1+$r,$y1+$r,$r*2,$r*2,180,270,$col);
    imagearc($img,$x2-$r,$y1+$r,$r*2,$r*2,270,360,$col);
    imagearc($img,$x1+$r,$y2-$r,$r*2,$r*2,90,180,$col);
    imagearc($img,$x2-$r,$y2-$r,$r*2,$r*2,0,90,$col);
}

// ── FONDO OSCURO ─────────────────────────────────────────────────
[$br,$bg_,$bb_]=($cfg['bg']);
$BG=c($canvas,$br,$bg_,$bb_);
imagefill($canvas,0,0,$BG);

// ── BANDERA PRIDE — FRANJA INFERIOR ──────────────────────────────
$st=$cfg['st'];
$ns=count($st);
$flagH=155;
$flagY=$H-$flagH;

for($si=0;$si<$ns;$si++){
    [$sr,$sg,$sb]=rgb($st[$si],$P);
    $sc=c($canvas,$sr,$sg,$sb);
    $x1=(int)($si*$W/$ns); $x2=(int)(($si+1)*$W/$ns);
    imagefilledrectangle($canvas,$x1,$flagY,$x2,$H,$sc);
}

// Degradado oscuro sobre la bandera para legibilidad del texto
for($y=$flagY;$y<$H;$y++){
    $tt=($y-$flagY)/$flagH;
    $al=(int)(20+$tt*50);
    $ov=c($canvas,$br,$bg_,$bb_,$al);
    imageline($canvas,0,$y,$W,$y,$ov);
}

// ── BANDERA PRIDE — FRANJA SUPERIOR (delgada decorativa) ─────────
$topH=18;
for($si=0;$si<$ns;$si++){
    [$sr,$sg,$sb]=rgb($st[$si],$P);
    $sc=c($canvas,$sr,$sg,$sb);
    $x1=(int)($si*$W/$ns); $x2=(int)(($si+1)*$W/$ns);
    imagefilledrectangle($canvas,$x1,0,$x2,$topH,$sc);
}

// Línea divisoria sutil
$lineDiv=c($canvas,255,255,255,100);
imageline($canvas,0,$flagY,$W,$flagY,$lineDiv);
imageline($canvas,0,$flagY+1,$W,$flagY+1,c($canvas,0,0,0,80));

// ── GLOW CENTRAL ─────────────────────────────────────────────────
[$ar,$ag,$ab]=$cfg['ac'];
$centerY=(int)(($flagY+$topH)/2);
for($gr=350;$gr>=10;$gr-=16){
    $ratio=$gr/350;
    $al=(int)((1-$ratio)*42+100);
    $al=min(127,$al);
    $gc=c($canvas,$ar,$ag,$ab,$al);
    imagefilledellipse($canvas,(int)($W/2),$centerY,$gr,(int)($gr*0.7),$gc);
}

// ── PARTÍCULAS SUTILES ───────────────────────────────────────────
$prideKeys=['red','orange','yellow','green','blue','violet','transpink','transblue'];
for($i=0;$i<55;$i++){
    $pk=$prideKeys[array_rand($prideKeys)];
    [$pr,$pg,$pb]=rgb($pk,$P);
    $pcol=c($canvas,$pr,$pg,$pb,rand(75,115));
    $ps=rand(1,3);
    imagefilledellipse($canvas,rand(0,$W),rand($topH,$flagY),$ps,$ps,$pcol);
}

// ── DESCARGAR LOGO ────────────────────────────────────────────────
$ch=curl_init($url_logo);
curl_setopt_array($ch,[
    CURLOPT_RETURNTRANSFER=>true, CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_USERAGENT=>'Mozilla/5.0', CURLOPT_TIMEOUT=>12,
    CURLOPT_FOLLOWLOCATION=>true,
]);
$raw=curl_exec($ch);
curl_close($ch);

// ── LOGO EN CÍRCULO ───────────────────────────────────────────────
$LD=320; // diámetro del círculo
$LCX=(int)($W/2);
$LCY=(int)(($flagY+$topH)/2);
$LX=(int)($LCX-$LD/2);
$LY=(int)($LCY-$LD/2);

if($raw){
    $src=@imagecreatefromstring($raw);
    if($src){
        $sw=imagesx($src);$sh=imagesy($src);

        // Escalar a LD×LD
        $scaled=imagecreatetruecolor($LD,$LD);
        $trans=imagecolorallocatealpha($scaled,0,0,0,127);
        imagefill($scaled,0,0,$trans);
        imagealphablending($scaled,true);
        imagesavealpha($scaled,true);
        imagecopyresampled($scaled,$src,0,0,0,0,$LD,$LD,$sw,$sh);

        // Recorte circular pixel a pixel
        $circle=imagecreatetruecolor($LD,$LD);
        imagealphablending($circle,false);
        imagesavealpha($circle,true);
        $fullT=imagecolorallocatealpha($circle,0,0,0,127);
        imagefill($circle,0,0,$fullT);
        imagealphablending($circle,true);

        $r2=$LD/2;
        for($py=0;$py<$LD;$py++){
            for($px=0;$px<$LD;$px++){
                if(sqrt(($px-$r2)**2+($py-$r2)**2)<=$r2){
                    $pxc=imagecolorat($scaled,$px,$py);
                    $rr=($pxc>>16)&0xFF;$gg=($pxc>>8)&0xFF;$bbb=$pxc&0xFF;
                    imagesetpixel($circle,$px,$py,imagecolorallocate($circle,$rr,$gg,$bbb));
                }
            }
        }

        // Anillos pride detrás del logo
        $ringK=['violet','blue','green','yellow','orange','red'];
        foreach($ringK as $ri=>$rk){
            [$rr,$rg,$rb]=rgb($rk,$P);
            $rc=c($canvas,$rr,$rg,$rb,92+$ri*3);
            $rs=$LD+20+$ri*13;
            imagefilledellipse($canvas,$LCX,$LCY,$rs,$rs,$rc);
        }

        // Sombra oscura del logo
        $shd=c($canvas,0,0,0,55);
        imagefilledellipse($canvas,$LCX+6,$LCY+7,$LD+14,$LD+14,$shd);

        // Pegar círculo recortado
        imagecopy($canvas,$circle,$LX,$LY,0,0,$LD,$LD);

        // Borde blanco del círculo
        $wring=c($canvas,255,255,255,60);
        imageellipse($canvas,$LCX,$LCY,$LD+3,$LD+3,$wring);
        imageellipse($canvas,$LCX,$LCY,$LD+5,$LD+5,$wring);
        imageellipse($canvas,$LCX,$LCY,$LD+2,$LD+2,c($canvas,255,255,255,100));

        imagedestroy($src);imagedestroy($scaled);imagedestroy($circle);
    }
}

// ════════════════════════════════════════════════════════════
//   BADGE / ETIQUETAS SOBRE LA IMAGEN
// ════════════════════════════════════════════════════════════

// ── BADGE 1: Nombre de estilo — esquina superior IZQUIERDA ───────
$nm=strtoupper($cfg['nm']);
$f4w=imagefontwidth(4);$f4h=imagefontheight(4);
$bPX=16;$bPY=9;
$b1W=$f4w*strlen($nm)+$bPX*2;$b1H=$f4h+$bPY*2;
$b1X=24;$b1Y=$topH+18;
// fondo translúcido
$b1bg=c($canvas,0,0,0,55);
fillrect($canvas,$b1X,$b1Y,$b1X+$b1W,$b1Y+$b1H,10,$b1bg);
// borde blanco semitransparente
$b1brd=c($canvas,255,255,255,80);
strokerect($canvas,$b1X,$b1Y,$b1X+$b1W,$b1Y+$b1H,10,$b1brd);
// texto blanco
imagestring($canvas,4,$b1X+$bPX,$b1Y+$bPY,$nm,c($canvas,255,255,255));

// ── BADGE 2: Premio especial — esquina superior DERECHA ───────────
$bd=strtoupper($cfg['bd']);
$b2W=$f4w*strlen($bd)+$bPX*2;$b2H=$f4h+$bPY*2;
$b2X=$W-$b2W-24;$b2Y=$topH+18;
[$bbr,$bbg,$bbb2]=$cfg['bb'];
[$bfr,$bfg,$bfb]=$cfg['bf'];
// sombra del badge
$b2shd=c($canvas,0,0,0,80);
fillrect($canvas,$b2X+3,$b2Y+3,$b2X+$b2W+3,$b2Y+$b2H+3,10,$b2shd);
// fondo del badge con el color del preset
$b2bg=c($canvas,$bbr,$bbg,$bbb2);
fillrect($canvas,$b2X,$b2Y,$b2X+$b2W,$b2Y+$b2H,10,$b2bg);
// texto
imagestring($canvas,4,$b2X+$bPX,$b2Y+$bPY,$bd,c($canvas,$bfr,$bfg,$bfb));

// ── BADGE 3: "DEYLIN SYSTEMS" — centro sobre la bandera inferior ──
$mainTxt='DEYLIN SYSTEMS';
$f5w=imagefontwidth(5);$f5h=imagefontheight(5);
$mW=$f5w*strlen($mainTxt);
$mX=(int)(($W-$mW)/2);
$mY=$flagY+20;
// sombra
imagestring($canvas,5,$mX+2,$mY+2,$mainTxt,c($canvas,0,0,0,40));
// texto blanco brillante
imagestring($canvas,5,$mX,$mY,$mainTxt,c($canvas,255,255,255));

// ── BADGE 4: "LOVE IS LOVE · PRIDE 2026" — debajo del nombre ─────
$sub='LOVE IS LOVE  ·  PRIDE 2026';
$sW=$f4w*strlen($sub);
$sX=(int)(($W-$sW)/2);
$sY=$mY+$f5h+6;
// fondo semi para legibilidad
$sBg=c($canvas,0,0,0,65);
imagefilledrectangle($canvas,$sX-10,$sY-3,$sX+$sW+10,$sY+$f4h+3,$sBg);
imagestring($canvas,4,$sX,$sY,$sub,c($canvas,$ar,$ag,$ab));

// ── BADGE 5: "★ PREMIUM PRIDE ★" pequeño — lateral izquierdo ─────
$side='* PREMIUM PRIDE *';
$sideW=$f4w*strlen($side);
$sideX=20;
$sideY=(int)(($flagY+$topH)/2)-$f4h/2;
// solo si no choca con el logo (logo centrado)
if($sideX+$sideW < $LX-20){
    $sdBg=c($canvas,0,0,0,75);
    fillrect($canvas,$sideX-8,$sideY-6,$sideX+$sideW+8,$sideY+$f4h+6,8,$sdBg);
    imagestring($canvas,4,$sideX,$sideY,$side,c($canvas,$ar,$ag,$ab));
}

// ── BADGE 6: mismo del lado DERECHO ──────────────────────────────
$sideR='DEYLIN © 2026';
$sideRW=$f4w*strlen($sideR);
$sideRX=$W-$sideRW-20;
if($sideRX > $LX+$LD+20){
    $sdBg2=c($canvas,0,0,0,75);
    fillrect($canvas,$sideRX-8,$sideY-6,$sideRX+$sideRW+8,$sideY+$f4h+6,8,$sdBg2);
    imagestring($canvas,4,$sideRX,$sideY,$sideR,c($canvas,255,255,255,30));
    imagestring($canvas,4,$sideRX,$sideY,$sideR,c($canvas,$ar,$ag,$ab));
}

// ── BORDE ARCOÍRIS EXTERIOR ───────────────────────────────────────
for($si=0;$si<$ns;$si++){
    [$sr,$sg,$sb]=rgb($st[$si],$P);
    $sc=c($canvas,$sr,$sg,$sb);
    $x1=(int)($si*$W/$ns);$x2=(int)(($si+1)*$W/$ns);
    // borde inferior
    imageline($canvas,$x1,$H-1,$x2,$H-1,$sc);
    imageline($canvas,$x1,$H-2,$x2,$H-2,$sc);
}
// bordes laterales
for($si=0;$si<$ns;$si++){
    [$sr,$sg,$sb]=rgb($st[$si],$P);
    $sc=c($canvas,$sr,$sg,$sb);
    $y1=(int)($si*$H/$ns);$y2=(int)(($si+1)*$H/$ns);
    imageline($canvas,0,$y1,0,$y2,$sc);
    imageline($canvas,1,$y1,1,$y2,$sc);
    imageline($canvas,$W-1,$y1,$W-1,$y2,$sc);
    imageline($canvas,$W-2,$y1,$W-2,$y2,$sc);
}

// ── OUTPUT ────────────────────────────────────────────────────────
header('Content-Type: image/png');
header('Cache-Control: public, max-age=3600');
imagepng($canvas,null,6);
imagedestroy($canvas);
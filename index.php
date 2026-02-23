<?php
error_reporting(0);
ini_set('display_errors', 0);

// Parámetros de la API
$url_logo = $_GET['logo'] ?? '';
$estilo = $_GET['estilo'] ?? 1; // Nuevo parámetro para 10 estilos
$img_predeterminada = "https://ik.imagekit.io/pm10ywrf6f/bot_by_deylin/1769830823123_e336030d2dfd15b3f2a9bec8d30e15f3_YZEsD9KKM.jpg";

// --- DASHBOARD PRINCIPAL ---
if (empty($url_logo)) {
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Deylin Systems - Banner API</title>
        <script src='https://cdn.tailwindcss.com'></script>
        <style>
            body { background: #0a0a0a; color: #00ff00; font-family: 'Courier New', monospace; }
            .rainbow-text { background: linear-gradient(to right, #ef4444, #f59e0b, #10b981, #3b82f6, #8b5cf6); -webkit-background-clip: text; color: transparent; }
            .neon-border { border: 1px solid #00ff00; box-shadow: 0 0 10px #00ff00; }
        </style>
    </head>
    <body class='p-5'>
        <div class='max-w-4xl mx-auto'>
            <header class='text-center mb-8 neon-border p-4 bg-black'>
                <h1 class='text-3xl font-bold rainbow-text'>DEYLIN SYSTEMS - GAY PRIDE API</h1>
                <p class='text-white mt-2'>Generador de Banners Automatizado</p>
            </header>

            <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                <div class='neon-border p-4 bg-zinc-900'>
                    <h2 class='text-xl mb-4 text-magenta-500 font-bold'>PREVISUALIZACIÓN</h2>
                    <img id='preview' src='?logo=$img_predeterminada&estilo=1' class='w-full rounded border border-zinc-700 shadow-lg'>
                    <div class='mt-4 flex flex-col gap-2'>
                        <button onclick='copyUrl()' class='bg-green-600 text-black font-bold p-2 hover:bg-green-400'>COPIAR URL API</button>
                        <a id='test-link' href='?logo=$img_predeterminada&estilo=1' target='_blank' class='bg-blue-600 text-white text-center font-bold p-2 hover:bg-blue-400'>VER RESULTADO</a>
                    </div>
                </div>

                <div class='neon-border p-4 bg-zinc-900 overflow-y-auto h-[400px]'>
                    <h2 class='text-xl mb-4 font-bold'>SELECCIONAR ESTILO (1-10)</h2>
                    <div class='grid grid-cols-2 gap-2'>
                        " . implode('', array_map(fn($i) => "<button onclick='changeStyle($i)' class='border border-green-800 p-2 hover:bg-green-900'>Estilo $i</button>", range(1, 10))) . "
                    </div>
                </div>
            </div>
        </div>

        <script>
            let currentStyle = 1;
            const baseUrl = window.location.href.split('?')[0];
            const logo = '$img_predeterminada';

            function changeStyle(id) {
                currentStyle = id;
                const newUrl = `?logo=\${logo}&estilo=\${id}`;
                document.getElementById('preview').src = newUrl;
                document.getElementById('test-link').href = newUrl;
            }

            function copyUrl() {
                const fullUrl = `\${baseUrl}?logo=\${logo}&estilo=\${currentStyle}`;
                navigator.clipboard.writeText(fullUrl);
                alert('URL Copiada: ' + fullUrl);
            }
        </script>
    </body>
    </html>";
    exit;
}

// --- GENERADOR DE IMAGEN (LA API) ---
$w = 1200; $h = 600;
$canvas = imagecreatetruecolor($w, $h);

// 10 Variantes de Colores (Estilos)
$palette = [
    1 => [[255,0,0], [255,165,0], [255,255,0], [0,128,0], [0,0,255], [128,0,128]], // Pride Tradicional
    2 => [[213,121,255], [255,255,255], [255,175,200]], // Soft Pastel
    3 => [[0,0,0], [50,50,50], [100,100,100], [0,255,0]], // Matrix Style
    4 => [[255,0,128], [255,255,255], [0,200,255]], // Trans Pride Colors
    5 => [[255,20,147], [138,43,226], [0,0,255]], // Bi Colors
    6 => [[255,140,0], [255,255,255], [200,0,200]], // Sunset
    7 => [[0,255,255], [255,0,255], [255,255,0]], // Cyberpunk
    8 => [[34,34,34], [186,85,211], [75,0,130]], // Dark Purple
    9 => [[255,255,255], [200,200,200], [150,150,150]], // Minimalist White
    10 => [[255,0,0], [0,0,0], [255,0,0]] // Red & Black Aggressive
];

$selected_colors = $palette[$estilo] ?? $palette[1];
$colors = array_map(fn($c) => imagecolorallocate($canvas, $c[0], $c[1], $c[2]), $selected_colors);

$fh = $h / count($colors);
foreach ($colors as $i => $col) {
    imagefilledrectangle($canvas, 0, $i * $fh, $w, ($i + 1) * $fh, $col);
}

// Efectos de fondo (Burbujas)
$white_t = imagecolorallocatealpha($canvas, 255, 255, 255, 80);
for($i = 0; $i < 15; $i++) {
    imagefilledellipse($canvas, rand(0, $w), rand(0, $h), rand(100, 400), rand(100, 400), $white_t);
}

// Carga de Logo
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_logo);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$raw = curl_exec($ch);
curl_close($ch);

if ($raw) {
    $logo_img = @imagecreatefromstring($raw);
    if ($logo_img) {
        $lw = imagesx($logo_img); $lh = imagesy($logo_img);
        // Sombra/Fondo del logo
        $negro = imagecolorallocate($canvas, 0, 0, 0);
        imagefilledrectangle($canvas, 395, 95, 805, 505, $negro);
        imagecopyresampled($canvas, $logo_img, 400, 100, 0, 0, 400, 400, $lw, $lh);
    }
}

// Texto inferior
$frases = ["DEYLIN SYSTEMS", "PRIDE STYLE", "SISTEMA ACTIVO", "GAY POWER"];
$frase = $frases[array_rand($frases)];
$n = imagecolorallocate($canvas, 0, 0, 0);
$b = imagecolorallocate($canvas, 255, 255, 255);
imagefilledrectangle($canvas, 300, 520, 900, 580, $n);
$x = 600 - (strlen($frase) * 5); 
imagestring($canvas, 5, $x, 540, $frase, $b);

header('Content-Type: image/png');
imagepng($canvas);
imagedestroy($canvas);
?>

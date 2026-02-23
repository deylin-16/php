<?php
error_reporting(0);
ini_set('display_errors', 0);

$url_logo = $_GET['logo'] ?? '';
$estilo = $_GET['estilo'] ?? 1;
$img_predeterminada = "https://ik.imagekit.io/pm10ywrf6f/bot_by_deylin/1769830823123_e336030d2dfd15b3f2a9bec8d30e15f3_YZEsD9KKM.jpg";

// --- DASHBOARD DE LUJO (UI/UX) ---
if (empty($url_logo)) {
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Deylin Systems | Premium Banner Lab</title>
        <script src='https://cdn.tailwindcss.com'></script>
        <link href='https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@300;500;700&display=swap' rel='stylesheet'>
        <style>
            body { 
                background: radial-gradient(circle at top, #1a1a2e 0%, #0d0d0d 100%); 
                color: #e0e0e0; 
                font-family: 'Rajdhani', sans-serif;
            }
            .premium-font { font-family: 'Orbitron', sans-serif; }
            .glass { 
                background: rgba(255, 255, 255, 0.03); 
                backdrop-filter: blur(10px); 
                border: 1px solid rgba(255, 255, 255, 0.1); 
                border-radius: 1.5rem;
            }
            .neon-text { text-shadow: 0 0 10px rgba(0, 255, 150, 0.5); color: #00ff96; }
            .btn-premium {
                background: linear-gradient(45deg, #6366f1, #a855f7, #ec4899);
                transition: all 0.3s ease;
            }
            .btn-premium:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(168, 85, 247, 0.4); }
            .card-style { transition: 0.3s; cursor: pointer; border: 2px solid transparent; }
            .card-style:hover { border-color: #a855f7; background: rgba(168, 85, 247, 0.1); }
        </style>
    </head>
    <body class='min-h-screen flex flex-col items-center justify-center p-4'>
        <div class='glass p-8 w-full max-w-5xl shadow-2xl'>
            <header class='text-center mb-10'>
                <h1 class='premium-font text-5xl font-bold tracking-widest neon-text mb-2'>DEYLIN SYSTEMS</h1>
                <p class='text-zinc-400 uppercase tracking-widest text-sm'>Banner Generation Engine V3.0 — Mode: <span class='text-purple-400'>PREMIUM</span></p>
            </header>

            <div class='grid grid-cols-1 lg:grid-cols-12 gap-8'>
                <div class='lg:col-span-7 space-y-4'>
                    <div class='relative group'>
                        <div class='absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-1000'></div>
                        <img id='preview' src='?logo=$img_predeterminada&estilo=1' class='relative w-full rounded-xl border border-zinc-800 shadow-2xl'>
                    </div>
                    <div class='flex gap-4'>
                        <button onclick='copyUrl()' class='flex-1 btn-premium text-white font-bold py-3 rounded-lg uppercase tracking-tighter'>Copiar Endpoint API</button>
                        <button onclick='window.open(document.getElementById(\"preview\").src)' class='px-6 bg-zinc-800 hover:bg-zinc-700 rounded-lg'>Ver Raw</button>
                    </div>
                </div>

                <div class='lg:col-span-5 flex flex-col'>
                    <h3 class='premium-font text-sm mb-4 text-purple-300'>ESTILOS DE ÉLITE</h3>
                    <div class='grid grid-cols-2 gap-3 overflow-y-auto max-h-[400px] pr-2' id='styleContainer'>
                        " . implode('', array_map(fn($i) => "
                        <div onclick='changeStyle($i)' class='card-style glass p-3 text-center rounded-xl'>
                            <span class='text-xs block text-zinc-500'>PRESET</span>
                            <span class='font-bold text-white'>#0$i</span>
                        </div>", range(1, 10))) . "
                    </div>
                </div>
            </div>

            <footer class='mt-10 pt-6 border-t border-zinc-800 flex justify-between items-center text-xs text-zinc-500'>
                <div>BY DEYLIN © 2026 | ACCESS: GRANTED</div>
                <div class='flex gap-4'>
                    <span>PHP 8.5</span>
                    <span class='text-green-500'>• STABLE</span>
                </div>
            </footer>
        </div>

        <script>
            let currentStyle = 1;
            const logo = '$img_predeterminada';
            function changeStyle(id) {
                currentStyle = id;
                const newUrl = `?logo=\${logo}&estilo=\${id}`;
                document.getElementById('preview').src = newUrl;
            }
            function copyUrl() {
                const url = window.location.href.split('?')[0] + `?logo=\${logo}&estilo=\${currentStyle}`;
                navigator.clipboard.writeText(url);
                alert('API URL COPIADA CON ÉXITO');
            }
        </script>
    </body>
    </html>";
    exit;
}

// --- ENGINE DE IMAGEN PREMIUM ---
$w = 1200; $h = 600;
$canvas = imagecreatetruecolor($w, $h);
imagealphablending($canvas, true);
imagesavealpha($canvas, true);

// Paleta de colores Premium (Menos vibrantes, más elegantes/cinematográficos)
$presets = [
    1 => ['bg' => [10, 10, 26], 'accent' => [168, 85, 247], 'mode' => 'gradient'], // Dark Purple Luxe
    2 => ['bg' => [20, 20, 20], 'accent' => [0, 255, 150], 'mode' => 'matrix'],    // Cyber Neon
    3 => ['bg' => [40, 0, 40], 'accent' => [255, 20, 147], 'mode' => 'sunset'],   // Synthwave
    4 => ['bg' => [15, 15, 35], 'accent' => [0, 150, 255], 'mode' => 'ice'],      // Deep Blue
    5 => ['bg' => [25, 10, 10], 'accent' => [255, 45, 45], 'mode' => 'blood'],    // Red Minimal
    6 => ['bg' => [10, 30, 10], 'accent' => [173, 255, 47], 'mode' => 'toxic'],   // Acid Green
    7 => ['bg' => [0, 0, 0], 'accent' => [255, 215, 0], 'mode' => 'gold'],        // Luxury Gold
    8 => ['bg' => [30, 30, 50], 'accent' => [255, 255, 255], 'mode' => 'clean'],  // White Studio
    9 => ['bg' => [10, 10, 10], 'accent' => [236, 72, 153], 'mode' => 'pink'],    // Pink Shadow
    10 => ['bg' => [25, 25, 25], 'accent' => [255, 127, 80], 'mode' => 'coral']   // Coral Night
];

$config = $presets[$estilo] ?? $presets[1];
$bg_col = imagecolorallocate($canvas, $config['bg'][0], $config['bg'][1], $config['bg'][2]);
$acc_col = imagecolorallocate($canvas, $config['accent'][0], $config['accent'][1], $config['accent'][2]);
imagefill($canvas, 0, 0, $bg_col);

// Efecto de partículas de fondo
for($i = 0; $i < 50; $i++) {
    $p_col = imagecolorallocatealpha($canvas, $config['accent'][0], $config['accent'][1], $config['accent'][2], rand(100, 120));
    imagefilledellipse($canvas, rand(0, $w), rand(0, $h), rand(1, 4), rand(1, 4), $p_col);
}

// Dibujar marco Premium (Banderillas/Bordes)
$border_thickness = 15;
for($i = 0; $i < $border_thickness; $i++) {
    $alpha = 127 - ($i * 5);
    $b_col = imagecolorallocatealpha($canvas, $config['accent'][0], $config['accent'][1], $config['accent'][2], max(0, $alpha));
    imagerectangle($canvas, $i, $i, $w - $i - 1, $h - $i - 1, $b_col);
}

// Procesar Logo con Forma de Círculo Premium
$ch = curl_init($url_logo);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$raw = curl_exec($ch);
curl_close($ch);

if ($raw) {
    $logo_img = @imagecreatefromstring($raw);
    if ($logo_img) {
        $lw = imagesx($logo_img); $lh = imagesy($logo_img);
        
        // Sombra del logo
        $sh_col = imagecolorallocatealpha($canvas, 0, 0, 0, 60);
        imagefilledellipse($canvas, 605, 285, 410, 410, $sh_col);
        
        // Dibujar el logo (Recortado en circulo visualmente mediante un borde)
        imagecopyresampled($canvas, $logo_img, 400, 80, 0, 0, 400, 400, $lw, $lh);
        
        // Borde del logo (Anillo Premium)
        for($i=0; $i<8; $i++){
             imagerectangle($canvas, 400-$i, 80-$i, 800+$i, 480+$i, $acc_col);
        }
    }
}

// Tipografía y Textos (Simulación de fuentes mejores con formas)
$n_bg = imagecolorallocate($canvas, 0, 0, 0);
imagefilledrectangle($canvas, 350, 510, 850, 570, $n_bg);
imagerectangle($canvas, 350, 510, 850, 570, $acc_col); // Borde del texto

$texto = "DEYLIN SYSTEMS PREMIVM";
$white = imagecolorallocate($canvas, 255, 255, 255);
// Centrado aproximado
$x_text = 600 - (strlen($texto) * 4.5);
imagestring($canvas, 5, $x_text, 530, $texto, $white);

header('Content-Type: image/png');
imagepng($canvas);
imagedestroy($canvas);
?>

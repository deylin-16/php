<?php
error_reporting(0);
ini_set('display_errors', 0);

$url_logo = $_GET['logo'] ?? '';

// --- NUEVA PÁGINA DE BIENVENIDA ---
if (empty($url_logo)) {
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Deylin Systems - API Activa</title>
        <style>
            body { 
                background: #0f0f0f; 
                color: #00ff00; 
                font-family: 'Courier New', monospace; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                height: 100vh; 
                margin: 0; 
            }
            .panel { 
                border: 2px solid #00ff00; 
                padding: 20px; 
                box-shadow: 0 0 15px #00ff00; 
                text-align: center;
            }
            h1 { font-size: 1.5rem; margin-bottom: 10px; }
            p { color: #ffffff; }
            .status { color: #ff00ff; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class='panel'>
            <h1> > DEYLIN SYSTEMS _</h1>
            <p>Estado del Servidor: <span class='status'>ONLINE</span></p>
            <p>API de Banners: <span style='color: #ffff00;'>ACTIVA</span></p>
            <hr style='border-color: #00ff00;'>
            <p style='font-size: 0.8rem;'>Uso: ?logo=URL_DE_LA_IMAGEN</p>
        </div>
    </body>
    </html>";
    exit;
}

// --- RESTO DEL CÓDIGO DEL BANNER ---
$w = 1200; $h = 600;
$canvas = imagecreatetruecolor($w, $h);
$colors = [
    imagecolorallocate($canvas, 255, 0, 0),
    imagecolorallocate($canvas, 255, 165, 0),
    imagecolorallocate($canvas, 255, 255, 0),
    imagecolorallocate($canvas, 0, 128, 0),
    imagecolorallocate($canvas, 0, 0, 255),
    imagecolorallocate($canvas, 128, 0, 128)
];
$fh = $h / count($colors);
foreach ($colors as $i => $col) {
    imagefilledrectangle($canvas, 0, $i * $fh, $w, ($i + 1) * $fh, $col);
}
$white_t = imagecolorallocatealpha($canvas, 255, 255, 255, 70);
for($i = 0; $i < 20; $i++) {
    imagefilledellipse($canvas, rand(0, $w), rand(0, $h), rand(100, 500), rand(100, 500), $white_t);
}

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
        $lw = imagesx($logo_img);
        $lh = imagesy($logo_img);
        $negro = imagecolorallocate($canvas, 0, 0, 0);
        imagefilledrectangle($canvas, 410, 110, 810, 510, $negro);
        imagecopyresampled($canvas, $logo_img, 400, 100, 0, 0, 400, 400, $lw, $lh);
    }
}

$frases = ["MIRA ESTE GATO", "QUE TRAS-TOR", "DEYLIN SYSTEMS", "PRIDE STYLE"];
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

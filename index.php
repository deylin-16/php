<?php
error_reporting(0);
ini_set('display_errors', 0);
$url_logo = $_GET['logo'] ?? '';
if (empty($url_logo)) {
    die("SISTEMA ACTIVO - DEYLIN SYSTEMS");
}
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
?>

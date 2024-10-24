<?php
session_start();


header('Content-Type: image/svg+xml');


$captcha_text = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
$_SESSION['captcha'] = $captcha_text;


$svg = '
<svg width="150" height="50" xmlns="http://www.w3.org/2000/svg">
    <rect width="150" height="50" fill="white"/>
    <text x="10" y="30" font-family="Arial" font-size="20" fill="black">' . $captcha_text . '</text>';


for ($i = 0; $i < 50; $i++) {
    $x = mt_rand(0, 150);
    $y = mt_rand(0, 50);
    $dot_color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); 
    $svg .= '<circle cx="' . $x . '" cy="' . $y . '" r="1" fill="' . $dot_color . '"/>';
}

$svg .= '</svg>';


echo $svg;
?>

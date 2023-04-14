<?php
/*
CRIANDO IMAGEM

header("Content-Type: image/png");

$image = imagecreate(800, 700);

$black = imagecolorallocate($image, 0, 0, 0);

$red = imagecolorallocate($image, 255, 0, 0);

imagealphablending($image, true);
imagestring($image, 5, 60, 120, "TE AMO MUITO, E VOCÊ NÃO ME AMA", $red);

imagepng($image);
imagedestroy($image);
*/

//EDITANDO IMAGEM JPG

/*
$image = imagecreatefromjpeg("certificado.jpg");

$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $tileColor);
imagestring($image, 5, 440, 350, "Pedro Augusto", $tileColor);
imagestring($image, 3, 440, 370, utf8_decode("Concluído em: ") . date("d/m/Y"), $tileColor);

header("Content-Type: image/jpeg");
imagejpeg($image, "certificado-" . date("Y-m-d") . ".jpg", 100);


imagedestroy($image);
*/

//EDITANDO IMAGEM JPG COM FONTES DIFERENTES E PERSONALIZADAS
/*
$image = imagecreatefromjpeg("certificado.jpg");

$tileColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagettftext($image, 32, 0, 450,150, $tileColor, "fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf", "CERTIFICADO");
imagettftext($image, 32, 0, 440, 350, $tileColor, "fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf", "Pedro Augusto Pereira");
imagestring($image, 5, 440, 370, utf8_decode("Concluído em: ").date("d/m/Y"), $tileColor);

header("Content-Type: image/jpg");

imagejpeg($image);

imagedestroy($image);
*/

//GERAR MINIATURA DE IMAGEM -- MAIS PRECISAMENTE CROPAR UMA IMAGEM


header("Content-Type: image/jpg");

$file = "wallpaper.jpg";
$new_width = 256;
$new_height = 256;

list($old_width, $old_height) = getimagesize($file);

$new_image = imagecreatetruecolor($new_width, $new_height); // toda palheta de cores
$old_image = imagecreatefromjpeg($file);


imagecopyresampled($new_image, $old_image, 0, 0, 0, 0,$new_width, $new_height, $old_width, $old_height);

imagejpeg($new_image);

imagedestroy($old_image);
imagedestroy($new_image);





?>
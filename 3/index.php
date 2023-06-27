<?php

// Загрузка изображения
$source_img = imagecreatefromjpeg('1920x1200.jpeg');

// Вычисление яркости каждого пикселя и поиск наиболее темного
$width = imagesx($source_img);
$height = imagesy($source_img);

$darkest_pixel = 0;
$darkest_color = null;

for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $color_index = imagecolorat($source_img, $x, $y);
        $color = imagecolorsforindex($source_img, $color_index);

        $brightness = ($color['red'] + $color['green'] + $color['blue']) / 3;

        if ($brightness < $darkest_pixel) {
            $darkest_pixel = $brightness;
            $darkest_color = $color;
        }
    }
}

// загрузка и изменение размера изображения водяного знака
$watermark_img = imagecreatefrompng('watermark.png');
$watermark_width = imagesx($watermark_img);
$watermark_height = imagesy($watermark_img);
$w = min($width, $watermark_width);
$h = min($height, $watermark_height);
$resized_watermark_img = imagecreatetruecolor($w, $h);
imagecopyresampled($resized_watermark_img, $watermark_img, 0, 0, 0, 0, $w, $h, $watermark_width, $watermark_height);

// вставка водяного знака в координаты наиболее темного пикселя
$dst_x = $width - $w;  // правый нижний угол
$dst_y = $height - $h; // правый нижний угол
imagecopy($source_img, $resized_watermark_img, $dst_x, $dst_y, 0, 0, $w, $h);

// вывод изображения
header('Content-type: image/jpeg');
imagejpeg($source_img);
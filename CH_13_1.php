<?php
/**
 * グラフィックス
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */

// ボタンの画像を描く

/// GDの組み込みフォントは1～5の番号
$font = 3;

// 適切な画像サイズを計算する
$image_height = intval(imagefontheight($font) * 2);
$image_width = intval(strlen($_GET['button']) * imagefontwidth($font) * 1.3);

// 画像を生成
$image = imagecreate($image_width, $image_width);

// バックグランドが灰色の画像の中で使う色を生成
$back_color = imagecolorallocate($image, 216, 216, 216);
// 青い文字
$text_color = imagecolorallocate($image, 0, 0, 255);
// 黒い境界
$rect_color = imagecolorallocate($image, 0, 0, 0);

// 文字を描く場所を決める（水平方向の中央に、縦向きに）
$x = ($image_width - (imagefontwidth($font) * strlen($_GET['button']))) / 2;
$y = ($image_height - imagefontheight($font)) / 2;

// 文字を描く
imagestring($image, $font, $x, $y, $_GET['button'], $text_color);

// 黒い境界を描く
imagerectangle($image, 0, 0, imagesx($image) - 1, imagesy($image) - 1, $rect_color);

// ブラウザにイメージを送る
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
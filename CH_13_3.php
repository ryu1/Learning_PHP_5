<?php
/**
 * Shockwave/Flash
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 14:31
 * To change this template use File | Settings | File Templates.
 */


// フラッシュメービーの作成

// Actionscriptを可能にするためにSWFバージョン6を使う
ming_useswfversion(6);

// 新しいムービを作成して、パラメータをセット

$movie = new SWFMovie();
$movie->setRate(20.000000);
$movie->setDimension(550, 400);
$movie->setBackground(Oxcc, Oxcc, Oxcc);

// 円を作成

$circle = new SWFShape();
$circle->setRightFill(33, 66, 99);
$circle->drawCircle(40);
$sprite = new SWFSprite();
$sprite->add($circle);
$sprite->nextFrame();

// 円に動きを追加

$displayitem = $movie->add($sprite);
$displayitem->setName('circle');
$displayitem->movieTo(100,100);

// ドラッグを実装。ActionScriptを追加

$movie->add(new SWFAction("
    circle.onPress=function(){this.startDrag('');};
    circle.onRelease=circle.onReleaseOutside=function() { stopDrag(); };
"));

// ムービーを表示
header('Content-Type: application/x-shockwave-flash');
$movie->output(1);

?>

<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pu/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"WIDTH"="300" HEIGHT="300">
<PARAM NAME=movie VALUE="ming.php">
<PARAM NAME=bgcolor VALUE="#ffffff">
<EMBED src="ming.php" bgcolor="#ffffff" WIDTH="300" HEIGHT="300" TYPE="application/x-shockwave-flash" PLUBINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED>
</OBJECT>
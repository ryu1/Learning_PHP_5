<?php
/**
 * マルチバイト文字列の処理を行う関数
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 14:55
 * To change this template use File | Settings | File Templates.
 */

// マルチバイト文字列の長さを求める例

$name = '鈴木タロウ';
print strlen($name) . PHP_EOL;
print mb_strlen($name) . PHP_EOL;

// マルチバイト文字列の一部を取得する例

$name = "鈴木タロウさん"; // UTF-8
echo mb_strcut($name, 6, 10), PHP_EOL;   // 出力：タロウ
echo mb_substr($name, 2, 3), PHP_EOL;    // 出力：タロウ
echo substr($name, 3, 4), PHP_EOL;       // 出力：木(OxE69CAB)+OxE3

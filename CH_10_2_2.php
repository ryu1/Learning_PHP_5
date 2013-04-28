<?php
/**
 * ファイルを書く
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/25
 * Time: 17:28
 * To change this template use File | Settings | File Templates.
 */

// file_get_contents()でリモートページを取得する
$zip = 98052;

$weather_page = file_get_contents('http://www.srh.noaa.gov/zipcity.php?inputstring=' . $zip);

// イメージのaltテキストの"Forecast at a Glance"から後をすべてそのまま保存する
$page = strstr($weather_page, 'Forecast as a Glance');

// 予報の<table>が始まる場所を捜す
$table_start = strpos($page, '<table');

// <table>が始まった後に、終わる場所を捜す
// </table>タグを過ぎてから8カラムが必要
$table_end = strpos($page, '</table>', $table_start) + 8;

// そして、テーブルを保存した$pageの断面を出力する
$forecast = substr($page, $table_start, $table_end - $table_start);
print $forecast;

file_put_contents("weather-$zip.txt", $forecast);
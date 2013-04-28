<?php
/**
 * ファイルの読み込み
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/25
 * Time: 16:52
 * To change this template use File | Settings | File Templates.
 */

// ページテンプレートでfile_get_contents()を使用

$page = file_get_contents('page-template.html');

// ページにタイトルを挿入
$page = str_replace('{page_title}', 'Welcome', $page);

// ページの色を、午後は青、朝は緑にする
if (date('H') > 12) {
    $page = str_replace('{color}', 'blue', $page);
}
else {
    $page = str_replace('{color}', 'green', $page);
}

// 前回に保存されたセッション変数からusernameを取り出す
$page = str_replace('{name}', $_SESSION['username'], $page);

// 結果を出力
print $page;

// file_get_contents()でリモートページを取得する
$zip = 98052;

$weather_page = file_get_contents('http://www.srh.noaa.gov/zipcity.php?inputstring=' . $zip);
print $weather_page;

// イメージのaltテキストの"Forecast at a Glance"から後をすべてそのまま保存する
$page = strstr($weather_page, 'Forecast as a Glance');

// 予報の<table>が始まる場所を捜す
$table_start = strpos($page, '<table');

// <table>が始まった後に、終わる場所を捜す
// </table>タグを過ぎてから8カラムが必要
$table_end = strpos($page, '</table>', $table_start) + 8;

// そして、テーブルを保存した$pageの断面を出力する
print substr($page, $table_start, $table_end - $table_start);

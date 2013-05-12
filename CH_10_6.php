<?php
/**
 * エラーをチェックする
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/28
 * Time: 19:11
 * To change this template use File | Settings | File Templates.
 */

// fopen()とfclose()のエラーをチェックする

require 'MDB2.php';

$db = MDB2::connect('msql://hunter:w)mp3s@db.example.com/restaurant');

// 書き出すためにdishes.txtを開く

$fh = fopen('/usr/local/dishes.txt', 'wb');

if (! $fh) {
    print "Error opening dishes.txt: $php_errormsg";
}
else {
    $q = $db->query("SELECT dish_name, price FROM dishes");
    while ($row = $q->fetchRow()) {
        // 各行を（行末の各行とともに）dishes.txtファイルに書き出す
        fwrite($fh, "The price of $row[0] is $row[1] ¥n");
    }
    if (! fclose($fh)) {
        print "Error closing dishes.txt: $php_errormsg";
    }
}

// file_get_contents()のエラーをチェックすｒ

$page = file_get_contents('page_template.html');


// テスト式の中の３つの等価符号に注意
if ($page === false) {
    print "Couldn't load template: $php_errormsg";
}
else {
    // ...ここでテンプレートを処理する。

}

// fopen()、fget()、fclose()のエラーをチェック
$fh = fopen('people.txt', 'rb');
if (! $fh) {
    print "Error opening people.txt: $php_errormsg";
}
else {
    for ($line = fgets($fh); ! feof($fh); $line = fgets($fh)) {
        if ($line === false) {
            print "Error reading line: $php_errormsg";
        }
        else {
            $line = trim($line);
            $info = explode('|', $line);
            print '<li><a href="mailto:' . $info[0] . '">' . info[1] . "</a></li>";
        }
    }
}

if (! fclose($fh)) {
    print "Error closing people.txt: $php_errormsg";
}


// file_put_contents()のエラーをチェックする

$zip = 10040;
$weather_page = file_get_contents('http://www.srh.noaa.gov/zipcitry.php?inputstring=' . $zip);

if ($weather_page === false) {
    print "Couldn't get weather for $zip";
}
else {
    // "Forecast at a Glance"というイメージaltテキストの後ろをすべて保存

    $page = strstr($weather_page, 'Forecast at Glance');

    // 予報の<table>が始まる場所を探す
    $table_start = strpos($page, '<table>');

    // <table>が終わる場所を探す
    // </table>タグを超えて8を加える必要がある
    $table_end = strpos($page, '</table>', $table_start) + 8;

    // テーブルを保持する$pageの断面を取得する

}
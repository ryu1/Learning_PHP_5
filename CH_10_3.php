<?php
/**
 * ファイルの部分的な読み込みと書き出し
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/28
 * Time: 16:10
 * To change this template use File | Settings | File Templates.
 */

// 一度に１秒ずつファイルを読み込む

$fh = fopen('people.txt', 'rb');

for ($line = fgets($fh); ! feof($fh); $line = fgets($fh)) {
    $line = trim($line);
    $info = explode('|', $line);
    print '<li><a href="mailto:' . $info[0] . '">' . $info[1] . "</a></li>" . PHP_EOL;
}
fclose($fh);

require 'MDB2.php';

$db = MDB2::connect('mysql://hunter:w)mp3s@db.example.com/restaurant');

// 書き出すためにdiches.txtを開く

$fh = fopen('dishes.txt', 'wb');

$q = $db->query("SELECT dish_name, price FROM dishes");

while ($row = $q->fetchRow()) {
    fwrite($fh, "The price of $row[0] is $row[1]" . PHP_EOL);
}
fclose($fh);
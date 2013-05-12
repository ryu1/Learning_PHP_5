<?php
/**
 * CSVファイルで作業する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/28
 * Time: 16:53
 * To change this template use File | Settings | File Templates.
 */

require 'MDB2.php';

// データベースに接続

$db = MDB2::connect('mysql://hunter:w)mp3s@db.example.com/restaurant');

// CSVファイルを開く
$fh = fopen('dishes.csv', 'rb');

for ($info = fgetcsv($fh, 1024); ! feof($fh); $info = fgetcsv($fh, 1024)) {
    // $info[0]は、料理の名前（dishes.csvの最初のフィールド）
    // $info[1]は、値段（２番目のフィールド）
    // $info[2]は、スパイスの辛さ（３番目のフィールド）
    // データベースのテーブルに行を挿入
    $sth = $db->prepare('INSERT INTO dishes (dish_name, price, is_spacy) VALUES (?, ?, ?)');
    $sth->execute($info);
    print "Inserted $info[0]¥n";
}

// CSVフォーマットされた文字列を作成する

function make_csv_line($values) {
    // 値に、カンマ、引用符、スペース、タブ（¥t）、改行（¥n）
    // あるいは、ラインフィールド（¥r）を含む場合は、引用符で囲み
    // そのうちにある引用符は２つの引用符で表す。
    foreach ($values as $i => $value) {
        if ((strpos($value, ',') !== false) ||
            (strpos($value, '"') !== false) ||
            (strpos($value, ' ') !== false) ||
            (strpos($value, '¥t') !== false) ||
            (strpos($value, '¥n') !== false) ||
            (strpos($value, '¥r') !== false)) {
            $values[$i] = '"' . str_replace('"', '""', $value) . '"';
        }
    }
    // それぞれの値をカンマで連結し、最後に改行をつけて返す
    return implode(',', $values) . '¥n';

}

// ページタイプをCSVに変更する


require 'MDB2.php';
$db = MDB2::connect('mysql://hunter:w)mp3s@db.example.com/restaurant');

// WebクライアントにCSVファイルを期待するように伝える
// Webクライアントに、dishes.csvという名前のCSVファイルが送られて来ることを伝える
header('Content-Type: text/csv');
header('Content-Desposition: attachment; filename="dishes.csv"');

// データベースのテーブルから情報を取得して出力する
$dishes = $db->query('SELECT dish_name, price, is_spicy FROM dishes');
while ($row = $dishes->fetchRow()) {
    print make_csv_line($row);
}
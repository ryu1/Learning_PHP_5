<?php
/**
 * 取り出した行の書式を変更する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 16:53
 * To change this template use File | Settings | File Templates.
 */
require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}


// 文字列キー付き配列にフェッチモードを変更
$db -> setFetchMode(MDB2_FETCHMODE_ASSOC);

print "With query() and fetchRow():\n";

// query()とfetchRow()でそれぞれの行を取得

$q = $db -> query("SELECT dish_name, price FROM dishes");

while ($rows = $q->fetchRow()) {
    print "The price of $rows[dish_name] is $rows[price] \n";
}

print "With queryAll(): \n";
// aueryAll()ですべての行をを取得
$dishes = $db -> queryAll('SELECT dish_name, price FROM dishes');
foreach ($dishes as $dish) {
    print "The price of $dish[dish_name] is $dish[price] \n";
}

print "With queryRow(): \n";
$cheap = $db -> queryRow('SELECT dish_name, price FROM dishes ORDER BY price LIMIT 1');
print "The cheapest dish is $cheap[dish_name] with price $cheap[price]";


// オブジェクトとして行を取得する

// フェッチモードをオブジェクトに変更
$db -> setFetchMode(MDB2_FETCHMODE_OBJECT);

print "With query() and fetchRow(): \n";

// query()とfetchRow()でそれぞれの行を取得
$q = $db -> query("SELECT dish_name, price FROM dishes");

while ($row = $q -> fetchRow()) {
    print "The price of $row->dish_name is $row->price \n";
}

print "With queryAll(): \n";
// queryAll()ですべての行を取得
$dishes = $db->queryAll('SELECT dish_name, price FROM dishes');
foreach ($dishes as $dish) {
    print "The price of $dish->dish_name is $dish->price \n";
}

print "With queryRow(): \n";
$cheap = $db->queryRow('SELECT dish_name, price FROM dishes ORDER BY price LIMIT 1');
print "The cheapest dish is $cheap->dish_name with price $cheap->price";
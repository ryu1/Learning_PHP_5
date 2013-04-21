<?php
/**
 * データベースにデータを書き込む
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/21
 * Time: 16:14
 * To change this template use File | Settings | File Templates.
 */

require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}

$q = $db->query(
    "INSERT INTO dishes(dish_name, price, is_spicy)
    VALUES ('Sesame Seed Puff', 2.50, 0)"
);

// query()のエラーをチェックする
if (MDB2::isError($q)) {
    die("query error: " . $q->getMessage());
}

$db->setErrorHandling(PEAR_ERROR_DIE);

$q = $db->query(
    "INSERT INTO dishes(dish_name, price, is_spicy)
    VALUES ('Sesame Seed Puff', 2.50, 0)"
);

print 'Query Succeeded!';

// query()でデータを更新する

$db -> query("
    UPDATE dishes SET is_spicy = 1
    WHERE dish_name = 'Eggplant with Chili Sauce'");

$db -> query(
    "UPDATE dishes SET is_spicy = 1, price = price * 2
    WHERE dish_name = 'Lobster with Chili Source'");

// query()でデータを削除する

if ($make_things_cheaper) {
    $db -> query("
        DELETE FROM dishes WHERE price > 19.95");
}
else {
    $db -> query(
        "DELETE FROM dishes");
}


$count = $db->exec("
    UPDATE dishes SET price = price - 5
    WHERE price > 20");

print 'Changed the price of '. $count . 'rows.';
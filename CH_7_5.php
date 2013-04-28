<?php
/**
 * フォームのデータを安定に挿入する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/21
 * Time: 20:47
 * To change this template use File | Settings | File Templates.
 */
require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}

// フォームデータの安全な挿入

$sth = $db -> prepare('INSERT INTO dishes (dish_name) VALUES (?)');
$sth -> execute(array($_POST['new_dish_name']));

// 複数のプレースホルダを使用する

$sth = $db -> prepare('INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?, ?, ?)');
$sth -> execute(array($_POST['new_dish_name'], $_POST['new_price'], $_POST['is_spicy']));

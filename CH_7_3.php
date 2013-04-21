<?php
/**
 * テーブルを作成する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/21
 * Time: 15:27
 * To change this template use File | Settings | File Templates.
 */

require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}

// データベースプログラムにCREATE TABLEコマンドを送る

$q = $db -> query("CREATE TABLE dishes (
        dish_id INT,
        dish_name VARCHAR(255),
        price DECIMAL(4,2),
        is_spicy INT
)");


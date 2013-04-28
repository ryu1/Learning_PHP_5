<?php
/**
 * データベースからデータを取得する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 15:47
 * To change this template use File | Settings | File Templates.
 */

require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}
// query()とfetchRow()で秒jを取得する

$q = $db -> query('SELECT dish_name, price FROM dishes');
while ($row = $q -> fetchRow()) {
    print "$row[0], $row[1] \n";
}

// numrows()で行を数える

$q = $db -> query('SELECT dish_name, price FROM dishes');
print 'There are ' . $q -> numrows() . ' rows in the dishes table.';


// queryAll()で行を取得する

$rows = $db -> queryAll('SELECT dish_name, price FROM dishes');
foreach ($rows as $row) {
    print "$row[0], $row[1] \n";
}

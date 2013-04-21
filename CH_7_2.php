<?php
/**
 * データベースプログラムに接続する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/21
 * Time: 3:12
 * To change this template use File | Settings | File Templates.
 */

/*
 * pear install MDB2-beta
 * pear install MDB2_Driver_mysql-beta
 */

require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}
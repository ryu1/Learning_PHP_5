<?php
/**
 * フォームのデータを安全に取得する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 17:47
 * To change this template use File | Settings | File Templates.
 */
require 'MDB2.php';
$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}

// SELECT命令文でプレースホルダを使わない例

// 最初は、値を標準クォーティングする
$dish = $db->quote($POST['dish_search']);

// そして、アンダースコアと％記号の前にバックスラッシュを置く
$dish = strtr($dish, array(
                        '_' => '\_',
                        '%' => '\%'));

// すると、$dishは浄化されて、正しくクエリを補完することができる
$matches = $db->queryAll("SELECT dish_name, price FROM dishes
                            WHERE dish_name LIKE $dish");


<?php
/**
 * 配列のサイズの洗い出し
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 13:30
 * To change this template use File | Settings | File Templates.
 */

// count()関数は配列内の要素の数を知らせます。

$dinner = array ('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboob Fungus');

$dishes = count($dinner);

print "There are $dishes things for dinner".PHP_EOL;

?>
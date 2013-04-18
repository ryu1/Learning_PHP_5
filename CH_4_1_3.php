<?php
/**
 * 数列配列
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 13:16
 * To change this template use File | Settings | File Templates.
 */

// array()で数値配列を作成する

$dinner = array('Sweet Corn and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');

print "I want $dinner[0] and $dinner[1].".PHP_EOL;

// []のある要素の追加
// ２つの要素を持つ$lunch配列を作成する

// 次は$lunch[0]を設定
$lunch[] = 'Dried Mushrooms in Brown Sauce';

// 次は$lunch[1]を設定
$lunch[] = 'Peneapple and Yu Fungus';

// $dinnerを3つの要素で作成する

$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
// $dinnerの最後に要素を追加
// 次は、$dinner[3]を設定
$dinner[] = 'Flank Skin with Spiced Flavor';

?>
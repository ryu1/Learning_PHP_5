<?php
/**
 * 多次元配列の使用
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 15:52
 * To change this template use File | Settings | File Templates.
 */

// array()で多次元配列を咲くせする

$meals = array('breakfast' => array('Walnut Bun', 'Coffee'),
                'lunch' => array('Cashew Nuts', 'White Mushrooms'),
                'snack' => array('Dried Mulberries', 'Salted Sesame Crab'));

$lunches = array(
    array('Chicken', 'Eggplant', 'Rice'),
    array('Beef', 'Scallions', 'Noodles'),
    array('Eggplant', 'Tofu')
);

$flavors = array(
    'Japanese' => array('hot' => 'wasabi',
                        'salty' => 'soy sauce'),
    'Chinese' => array('hot' => 'mustard',
                        'pepper-salty' => 'prickly ash')
);

// 多次元配列の要素にアクセスする
print $meals['lunch'][1];
print $meals['snack'][0];
print $lunches[0][0];
print $lunches[2][1];
print $flavors['Japanese']['salty'];
print $flavors['Chinese']['hot'];

// 多次元配列を処理する

$prices['dinner']['Sweet Corn and Asparagus'] = 12.50;
$prices['lunch']['Cashew Nuts and White Mushrooms'] = 4.95;
$prices['dinner']['Braised Bamboo Fungus'] = 8.95;
$prices['dinner']['total'] = $prices['dinner']['Sweet Corn and Asparagus'] + $prices['dinner']['Braised Bamboo Fungus'];

$specials[0][0] = 'Chestnut Bun';
$specials[0][1] = 'Walnut Bun';
$specials[0][2] = 'Peanut Bun';
$specials[1][0] = 'Chestnut Salad';
$specials[1][1] = 'Walnut Salad';

// インデックスを残して、配列の終わりに加える。
// すると$specials[1][2]が作成される。

$specials[1][] = 'Peanut Salad';

// foreach()で多次元配列の中を繰り返す。

$flavors = array(
    'Japanese' => array('hot' => 'wasabi',
        'salty' => 'soy sauce'),
    'Chinese' => array('hot' => 'mustard',
        'pepper-salty' => 'prickly ash')
);

// $cultureはキーで、$culture_flavorsは値（配列）

foreach ($flavors as $culture => $culture_flavors) {
    foreach ($culture_flavors as $flavor => $example) {
        print "A $culture $flavor flavor is $example.\n";
    }
}

// for()で多次元配列の中を繰り返す

$specials = array(
    array('Chestnut Bun', 'Walnut Bun', 'Peanut Bun'),
    array('Chestnut Salad', 'Walnut Salad', 'Peanut Salad'));

// $num_specialsは2:$specialsの第１次元の要素の番号

for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
    for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
        print "Element [$i][$m] is " . $specials[$i][$m] . "\n";
    }
}

// 多次元配列要素値の補完

$specials = array(
    array('Chestnut Bun', 'Walnut Bun', 'Peanut Bun'),
    array('Chestnut Salad', 'Walnut Salad', 'Peanut Salad'));

// $num_specialsは2:$specialsの第１次元の要素の番号

for ($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
    for ($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
        print "Element [$i][$m] is {$specials[$i][$m]}\n";
    }
}

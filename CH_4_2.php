<?php
/**
 * 配列内をループ」する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 13:35
 * To change this template use File | Settings | File Templates.
 */

// foreach()でループする

$meal = array('breakfast' => 'Walnut Bun',
                'lunch' => 'Cashew Nuts and White Mushrooms',
                'snack' => 'Dried Mulberries',
                'dinner' => 'Eggplant with Chili Sauce');

print "<table>\n";
foreach ($meal as $key => $value) {
    print "<tr><td>$key</td></tr><tr><td>$value</td></tr>\n";
}
print "</table>\n";

// テーブルの列の色を変換する

$row_color = array('red', 'green');
$color_index = 0;
$meal = array('breakfast' => 'Walnut Bun',
                'lunch' => 'Cashew Nuts and White Mushrooms',
                'snack' => 'Dried Mulberries',
                'dinner' => 'Eggplant with Chili Sauce');

print "<table>\n";

foreach($meal as $key => $value) {
    print '<tr bgcolor="' . $row_color[$color_index] . '">';
    print "<td>$key</td><td>$value</td></tr>\n";
    // これは$color_indexを0と1で切り替えます
    $color_index = 1 - $color_index;
}
print '</table>'.PHP_EOL;

// foreach()で配列を修正する

$meals = array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Dried Mulberries' => 3.00,
                'Eggplant with Chili Sauce' => 6.50);

foreach($meals as $dish => $price) {
    // $price = $price * 2ではうまく行きません
    $meals[$dish] = $meals[$dish] * 2;
}

// 配列をもう一度繰り返し処理して変更された値を出力します

foreach ($meals as $dish => $price) {
    printf("The new price of %s \$%.2f.\n", $dish, $price);
}

// 数値配列でforeach()を使用

$dinner = array('Sweet Corn and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');

foreach($dinner as $dish) {
    print "you can eat: $dish\n";
}

// for()で数値配列を反復する
for($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print "Dish number $i is $dinner[$i]\n";
}

// for(9でテーブルの色を変換する

$row_color = array('red', 'green');

$dinner = array('Sweet Corn and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');

print "<table>\n";

for($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print '<tr bgcolor="' . $row_color[$i % 2] . '">';
    print "<td>Element $i</td><td>$dinner[$i]</td></tr>\n";
}

print "</table>".PHP_EOL;

// 配列要素の順番とforeach(9
$letters[0] = 'A';
$letters[1] = 'B';
$letters[3] = 'D';
$letters[2] = 'C';

foreach($letters as $letter) {
    print $letter.PHP_EOL;
}

for ($i = 0, $num_letters = count($letters); $i < $num_letters; $i++) {
    print $letters[$i].PHP_EOL;
}

// 特殊キーで要素をチェックする

$meals = array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Dried Mulberries' => 3.00,
                'Eggplant with Chili Sauce' => 6.50,
                'Shrimp Puffs' => 0); // Shrimp Puffsは無料です

$books = array("The Eater's Guide to Chinese Characters",
                'How to Cook and Eat in chinese');

// これはtrue
if (array_key_exists('Shrimp Puffs', $meals)) {
    print "Yes, we have Shrimp Puffs".PHP_EOL;
}

// これはfalse
if (array_key_exists('Steak Sandwich', $meals)) {
    print "Yes, we have Steak Sandwich".PHP_EOL;
}

// これはtrue
if (array_key_exists(1, $books)) {
    print "Element 1 is How to Cook in Eat and Chinese".PHP_EOL;
}

// 特殊な値で要素をチェックする
$meals = array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Dried Mulberries' => 3.00,
                'Eggplant with Chili Sauce' => 6.50,
                'Shrimp Puffs' => 0);

$books = array("the Eater's Guide to Chinese Characters",
                "How to Cook and Eat in Chinese");

// これはtrue：キーDried Mulberriesの値は3.00
if (in_array(3, $meals)) {
    print 'There is a $3 item.' . PHP_EOL;
}

// これはtrue
if (in_array('How to Cook and Eat in Chinese', $books)) {
    print "We have How to Cook and Eat in Chinese\n";
}

// これはfalse：in_array()は大文字小文字を区別する
if (in_array("the eater's guide to chinese characters", $books)) {
    print "We have the Eater's Guide to Chinese Characters.\n";
}

// 特殊な値で要素を見つける
$meals = array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Eggplant with Chili Sauce' => 6.50);

$dish = array_search(6.50, $meals);
if ($dish) {
    print "$dish costs \$6.50";
}

?>
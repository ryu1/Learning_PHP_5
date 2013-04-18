<?php
/**
 * 配列を操作する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 15:02
 * To change this template use File | Settings | File Templates.
 */

// 配列要素の操作
$dishes['Beef Chow Foon'] = 12;
$dishes['Beef Chow Foon']++;
$dishes['Roast Duck'] = 3;

$dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];

if ($dishes['total'] > 15) {
    print "You ate a lot: ";
}

print 'You ate ' . $dishes['Beef Chow Foon'] . ' dishes of Beef Chow Foon.' . PHP_EOL;

// 二重引用符で囲まれた文字列に配列要素を書き込む
$meals['breakfast'] = 'Walnut Bun';
$meals['lunch'] = 'Eggplant with Chili Sauce';

$amounts = array(3, 6);

print "For breakfast, I'd like $meals[breakfast] and for lunch, ";
print "I'd live $meals[lunch]. I want $amounts[0] at breakfast and ";
print "$amounts[1] at lunch." . PHP_EOL;

// 中括弧で配列要素値を書き込む

$meals['Walnut Bun'] = '$3.95';
$hosts['www.example.com'] = 'web site';

print "A Walnut Bun costs {$meals['Walnut Bun']}.";
print "www.example.com is a {$hosts['www.example.com']}." . PHP_EOL;

// 要素を取り去る
unset($dishes['Roast Duck']);

$dimsum = array('Chicken Bun', 'Stuffed Duck Web', 'Turnip Cake');
$menu = implode(', ', $dimsum);
print $menu . PHP_EOL;

$letters = array('A', 'B', 'C', 'D');
print implode('', $letters) . PHP_EOL;

// implode()でHTMLテーブルの行を出力する
$dimsum = array('Chicken Bun', 'Stuffed Duck Web', 'Turnip Cake');
print '<tr><td>' . implode('</td><td>', $dimsum) . '</td></tr>' . PHP_EOL;

// explode()で文字列を配列に変換します
$fish = 'Bass, Carp, Pike, Flounder';
$fish_list = explode(', ', $fish);
print "The second fish is $fish_list[1]" . PHP_EOL;

?>
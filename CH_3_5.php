<?php
/**
 * 複雑な判定
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 17:17
 * To change this template use File | Settings | File Templates.
 */

$price_1 = 50.0;
$price_2 = 50.0;

print $price_1;
print $price_2;
print abs($price_1 - $price_2);

if (abs($price_1 - $price_2) < 0.00001) {
    print '$price_1 and $price_2 are equal.';
} else {
    print '$price_1 and $price_2 are not equal.';
}

// 文字列を数字に変換しないでアルファベット順を使って比較するにはstrcmp()を使用します。
// 1番目の文字列が2番目の文字列より大きいならば整数を返し、
// 1番目の文字列が2番目の文字列より小さいなら負数を返します。
// 文字列が等しければ、0を返します。

print "\n";
$x = strcmp("x54321", "x5678");
print $x;
print "\n";
if ($x > 0) {
    print 'The string "54321" is greater than the string "5678".';
    print "\n";
} elseif ($x < 0) {
    print 'The string "54321" is less than string "5678".';
    print "\n";
}

print "\n";
$x = strcmp("54321", "5678");
print $x;
print "\n";
if ($x > 0) {
    print 'The string "54321" is greater than the string "5678".';
    print "\n";
} elseif ($x < 0) {
    print 'The string "54321" is less than string "5678".';
    print "\n";
}

print "\n";
$x = strcmp("6pack", "55cardstud");
print $x;
print "\n";
if ($x > 0) {
    print 'The string "6pack" is greater than the string "55cardstud".';
    print "\n";
} elseif ($x < 0) {
    print 'The string "6pack" is less than string "55cardstud".';
    print "\n";
}

print "\n";
$x = strcmp("6pack", "55");
print $x;
print "\n";
if ($x > 0) {
    print 'The string "6pack" is greater than the string "55".';
    print "\n";
} elseif ($x < 0) {
    print 'The string "6pack" is less than string "55".';
    print "\n";
}

// 文字列を大文字、小文字を無視して比較する。
$first_name = "aaa";
$last_name = "bbb";
print "\n";
print strcasecmp($first_name, $last_name);
print "\n";
if (! strcasecmp($first_name, $last_name)) {
    print '$first_name and $last_name are equal.';
}

?>
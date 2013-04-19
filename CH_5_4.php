<?php
/**
 * 変数のスコープを理解する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/19
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */

// 変数のスコープ

$dinner = 'Curry Cuttlefish';

function vegetarian_dinner() {
    print "Dinner is $dinner, or ";
    $dinner = "Sauteed Pea Shoots";
    print $dinner;
    print "\n";
}

function kosher_dinner() {
    print "Dinner is $dinner, or ";
    $dinner = 'Kung Pao Chicken';
    print $dinner;
    print "\n";
}

print "Vegetarian ";
vegetarian_dinner();
print "Kosher ";
kosher_dinner();
print "Regular dinner is $dinner";

// $GLOBALS配列
print "\n";

$dinner = 'Curry Cuttlefish';

function macrobiotic_dinner() {
    $dinner = "Some Vegetables";
    print "Dinner is $dinner";
    // 海からの恵みに打ち負かされてしまう
    print " but I'd rather have ";
    print $GLOBALS['dinner'];
    print "\n";
}

macrobiotic_dinner();
print "Regular dinner is: $dinner";

// GLOBALS配列の変数を修正する

$dinner = 'Curry Cuttlefish';

function hungry_dinner() {
    $GLOBALS['dinner'] .= ' and Deep-Fried Taro';
}

print "Regular dinner is $dinner";
print "\n";
hungry_dinner();
print "Hungry dinner is $dinner";

// globalキーワード

$dinner = 'Curry Cuttlefish';

function vegetarian_dinner1() {
    global $dinner;
    print "Dinner was $dinner, but now it's ";
    $dinner = 'Sauteed Pea Shoots';
    print $dinner;
    print "\n";
}

print "Regular Dinner is $dinner.\n";
vegetarian_dinner1();
print "Regular dinner is $dinner";

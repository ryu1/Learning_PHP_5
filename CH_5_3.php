<?php
/**
 * 関数から値を返す
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/19
 * Time: 14:27
 * To change this template use File | Settings | File Templates.
 */

// 返り値の補足

$number_to_display = number_format(285266237);
print "The population of the US is about: $number_to_display";

// 関数の値を返す

function restaurant_check($meal, $tax, $tip) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}

// if()文に返り値を使う
// $15.22の食事に8.25%の税と15%のチップを加えた合計を見積もる
$total = restaurant_check(15.22, 6.25, 15);

print 'I only have $20 in cash, so...';

if ($total > 20) {
    print "I must pay with my credit card.";
} else {
    print "I can pay with cash.";
}

// 関数から配列を返す

function restaurant_check2($meal, $tax, $tip) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_notip = $meal + $tax_amount;
    $total_amount = $meal + $tax_amount + $tip_amount;
    return array($total_notip, $total_amount);
}

// restaurant_check()によって返された配列を使う

$totals = restaurant_check2(15.22, 8.25, 15);

if ($totals[0] < 20) {
    print 'The total without tip is less than $20.';
}
if ($totals[1] < 20) {
    print 'The total with tip is less than $20.';
}

// 複数のreturn命令文を持つ関数

function payment_method($cash_on_hand, $amount) {
    if ($amount > $cash_on_hand) {
        return 'cash_on_hand';
    }
    else {
        return 'cash';
    }
}

// 返り値をもう１つの関数に渡す
$total = restaurant_check(15.22, 8.25, 15);
$method = payment_method(20, $total);
print 'I will pay with ' . $method;

// if()で返り値を使います
if (restaurant_check(15,22, 8.25, 15) < 20) {
    print 'Less than $20, I can pay cash.';
} else {
    print 'Too expensive, I need my credit card.';
}

// trueまたはfalseを返す関数

function can_pay_cash($cash_on_hand, $amount) {
    if ($amount > $cash_on_hand) {
        return false;
    }
    else {
        return true;
    }
}

$total = restaurant_check(15.22, 8.25, 15);

if (can_pay_cash(20, $total)) {
    print "I can pay in cash.";
} else {
    print "Time for the credit card.";
}

// テスト式内の代入と関数呼び出し

function complete_bill($meal, $tax, $tip, $cash_on_hand) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    if ($total_amount > $cash_on_hand) {
        // 請求持ちあわ処理も高い
        return false;
    }
    else {
        // 料金を支払うことができる
        return $total_amount;
    }
}

if ($total = complete_bill(15.22, 8.25, 15, 20)) {
    print "I'm happy to pay $total.";
}
else {
    print "I don't have enough money. Shall I wash some dishes?";
}


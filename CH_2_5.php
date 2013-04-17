<?php
/**
 * 演習問題
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */

/*
* 2. 次のレストランの食事の勘定を計算するPHPプログラムを書いてみましょう。$4.95のハンバー
* ガーを2つ、$1.95のチョコレートミルクシェイクを1つ、85セントのコーラを1つ。売上税が
* 7.5%、それと、税抜でチップを16%払います。
*/
$tax = 7.5;
$chip = 0.16;

$hamburgerPrice = 4.95;
$hamburgerCount = 2;
$hamburgerTotalPrice = $hamburgerPrice * $hamburgerCount * (1 + $tax);

$chocolateMilkShakePrice = 1.95;
$chocolateMilkShakeCount = 1;
$chocolateMilkShakelTotalPrice = $chocolateMilkShakePrice * $chocolateMilkShakeCount * (1 + $tax);

$colaPrice = 0.85;
$colaCount = 1;
$colaTotalPrice = $colaPrice * $colaCount * (1 + $tax);

$totalPrice = ($hamburgerTotalPrice + $chocolateMilkShakelTotalPrice + $colaTotalPrice) * (1 + $chip);

print '$'.$totalPrice;

?>

<?php
/*
 * 3.  2への解法を修正して、フォーマットされた請求書を出力してみましょう。食事の各項目について、
 * 値段、数量、合計金額をそれぞれ出力します。食べ物と飲み物の税抜の合計額、税込の合計、
 * そして税金とチップの合計です。金額の出力が縦に並んでいることを確かめてください。
 */

$tax = 7.5;
$chip = 0.16;

$hamburgerPrice = 4.95;
$hamburgerCount = 2;
$hamburgerTax = $hamburgerPrice * $tax;
$hamburgerTotalPriceWithTax = ($hamburgerPrice + $hamburgerTax) * $hamburgerCount;
$hamburgerTotalPriceWithoutTax = $hamburgerPrice * $hamburgerCount;

$mealTotalPriceWithTax = $hamburgerTotalPriceWithTax;
$mealTotalPriceWithoutTax = $hamburgerTotalPriceWithoutTax;

$chocolateMilkShakePrice = 1.95;
$chocolateMilkShakeCount = 1;
$chocolateMilkShakeTax = $chocolateMilkShakePrice * $tax;
$chocolateMilkShakeTotalPriceWithTax = ($chocolateMilkShakePrice + $chocolateMilkShakeTax) * $chocolateMilkShakeCount;
$chocolateMilkShakeTotalPriceWithoutTax = $chocolateMilkShakePrice * $chocolateMilkShakeCount;

$colaPrice = 0.85;
$colaCount = 1;
$colaTax = $colaPrice * $tax;
$colaTotalPriceWithoutTax = $colaPrice * $colaCount;
$colaTotalPriceWithTax = ($colaPrice + $colaTax) * $colaCount;

$drinkTotalPriceWithTax = $chocolateMilkShakeTotalPriceWithTax + $colaTotalPriceWithTax;
$drinkTotalPrinceWithoutTax = $chocolateMilkShakeTotalPriceWithoutTax + $colaTotalPriceWithoutTax;

$taxTotal = $hamburgerTax + $chocolateMilkShakeTax + $colaTax;
$totalChip = ($mealTotalPriceWithoutTax + $drinkTotalPrinceWithoutTax) * $chip;

$receipt =  <<<DOC
ハンバーガー
    値段：\${$hamburgerPrice}
    数量：$hamburgerCount
    合計金額：\${$hamburgerTotalPriceWithoutTax}

チョコレートミルクシェイク
    値段：\${$chocolateMilkShakePrice}
    数量：$chocolateMilkShakeCount
    合計金額：\${$chocolateMilkShakeTotalPriceWithoutTax}

コーラ
    値段：\${$colaPrice}
    数量：{$colaCount}
    合計金：\${$colaTotalPriceWithoutTax}

食べ物
    合計金額（税抜き）：\${$mealTotalPriceWithoutTax}
    合計金額（税込）：\${$mealTotalPriceWithTax}

飲み物
    合計金額（税抜き）：\${$drinkTotalPriceWithTax}
    合計金額（税込）：\${$drinkTotalPriceWithTax}

税金
    合計：\${$taxTotal}

チップ
    合計：\${$totalChip}
DOC;

print $receipt;

?>

<?php
/*
 * 4.  $first_nameにあなたの名前、$last_nameにあなたの姓をセットするPHPのプログラムを書いて
 * みましょう。次に名前と姓をスペースで区切った文字列を出力します。また、その文字列の長さも
 * 出力します。
 */

$first_name = "はじめ";
$last_name = "きんだいち";
$full_name = $first_name.' '.$last_name;
print $full_name;
print strlen($full_name);

?>

<?php

/*
 * 5.  増分演算子（((）と組み合わせ乗算演算子（':）を使って、1から5までの数とその2の乗数とな
 * る2(2^1)から32(2^5)までを出力するPHPプログラムを書いてみましょう。
 */

$count = 0;
print ++$count;
print "\n";
print ++$count;
print "\n";
print ++$count;
print "\n";
print ++$count;
print "\n";
print ++$count;
print "\n";

$count = 0;
$countTemp = ++$count;
print $countTemp *= 2;
print "\n";
$countTemp = ++$count;
print $countTemp *= 2;
print "\n";
$countTemp = ++$count;
print $countTemp *= 2;
print "\n";
$countTemp = ++$count;
print $countTemp *= 2;
print "\n";
$countTemp = ++$count;
print $countTemp *= 2;


?>
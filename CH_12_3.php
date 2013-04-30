<?php
/**
 * プログラムデータを調べる
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 13:09
 * To change this template use File | Settings | File Templates.
 */

// var_dump()ですべてのサブミットされたフォームパラメタを出力する

print '<pre>';
var_dump($_POST);
print '</pre>';

// エラーログによるデバッグ出力をする壊れたプログラム

$prices = array(5.95, 3.00, 12.50);
$total_price = 0;
$tax_rate = 1.08; // 税金は8%

foreach($prices as $price) {
    error_log("[before: $total_price]");
    $total_price = $price * $tax_rate;
    error_log("[after: $total_price]");
}

printf('Total price (with tax): $%.2f' , $total_price);

// var_dump()で、エラーログにすべてのサブミットされたフォームパラメータを送信する

// 出力する代わりに出力を捕獲する
ob_start();

// var_dump()をいつものように呼び出す
var_dump($_POST);

// ob_start()を呼んでから生成された出力を$outputに格納する
$output = ob_get_contents();

// 出力を標準出力に戻す
ob_end_clean();

// $outputをエラーログへ送る
error_log($output);
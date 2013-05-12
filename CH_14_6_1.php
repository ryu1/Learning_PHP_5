<?php
/**
 * マルチバイト正規表現の例
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 23:00
 * To change this template use File | Settings | File Templates.
 */

// 正規表現処理の例

$zip = "１２３ー４５６７";  // 一致対象の文字列
if (mb_ereg("[¥d０-９]{3}[-ー][¥d０-９]{4}", $zip, $regs)) {
    print $regs[0]; // 出力：１２３−４５６７
}



// 文字列置換の例

mb_regex_encoding("UTF-8");

$str = "日本語は難しい";   // 一致対象の文字列
print mb_ereg_replace("難.{2}", "簡単だ", $str);    // 出力：日本語は簡単だ



// コールバック関数を使用する文字列の例

$str = "日本語は難しい";

print mb_ereg_replace_callback("[あ-ん]+", function ($match) {
    return $match[0] . '(' . mb_strlen($match[0]) . ')';
}, $str);   // 出力：日本語(1)は難しい(2)


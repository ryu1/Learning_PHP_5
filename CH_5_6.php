<?php
/**
 * 演習問題
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/19
 * Time: 15:56
 * To change this template use File | Settings | File Templates.
 */

/*
1.  関数を書いてHTMLタグ<img>を出力しましょう。関数は必須の引数としてイメージURLと、
オプションの引数としてaltテキスト、高さと幅を受け入れます。
*/

function print_img_tag($url, $alt = "", $height = "", $width = "") {
    printf('<img src="%s" alt="%s" height="%s" width="%s">', $url, $alt, $height, $width);
}

print_img_tag('http://', "comment", "12", "13");

/*
2.  ファイル名だけがURL引数として関数に渡されるように前述の演習の関数を修正しましょう。関
数内では、グローバル変数をファイル名の前につけて完全なURLを作成します。例えば、photo.
pngを関数に渡して、グローバル変数に/images/を含む場合は、出力される<img>タグのsrc属
性は,/images/photo.pngになります。このような関数は、イメージを新しいパスまたは新しいサー
バに移したとしても、イメージタグを正確に保つための簡単な手段になります。例えば、グローバ
ル変数を,/images/からhttp://images.example.com/へ変更するだけです。
*/

function print_img_tag1($file, $alt = "", $height = "", $width = "") {
    $url = $GLOBALS['path'] . $file;
    printf('<img src="%s" alt="%s" height="%s" width="%s">', $url, $alt, $height, $width);
}

$path = 'http://example.com/';
print_img_tag1('photo.png', "comment", "12", "13");
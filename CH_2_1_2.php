<?php
/**
 * テキストの操作
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/16
 * Time: 14:51
 * To change this template use File | Settings | File Templates.
 */

// trim()関数は、文字列から前後の空白を取り除きます。
// strlen()関数は、文字列の長さを調べます。

// trim()関数とstrlen()関数を使って、切り取った文字の長さをチェックす。
// $_POST['zipcode']は、サブミットされたフォームパラメータ
// "zipcode"の値を保持します。

$zipcode = trim($_POST['zipcode']);
// ここで$zipcodeには、前後のスペースが取り除かれた値が含みます。
$zip_length = strlen($zipcode);
// 郵便番号が5文字でなかれば文句を言います。
if ($zip_length != 5) {
    print 'Please enter a ZIP code that is 5 characters long.';
}

// トリムした文字列の長さを完結にチェックする
if (strlen(trim($_POST['zipcode']))) {
    print 'Please enter a ZIP code that is 5 characters long.';
}

// 文字列を等価演算子(==)で比較する。大文字、小文字を区別する
if ($_POST['email'] == 'president@whitehouse.gov') {
    print "Welcome, Mr. President.";
}

// 大文字、小文字の違いを意識しない文字列の比較
if (strcasecmp($_POST['email'], 'president@whitehouse.gov')) {
    print "Welcome, Mr. President.";
}

// テキストのフォーマット
// prinf()関数に、フォーマット文字列と、出力したい項目を渡す。
// フォーマットの規則
// パディング文字：フォーマット規則より短い場合に、詰める文字。0またはスペース文字など。
// 符号：+（プラス符号）は、数字に使用し、正の整数の前につける。（通常は、符号なしで出力）
//        -（マイナス符号）は、文字列につけ、右詰めする。（通常は左詰め。）
// 最小幅：最小となるべき大きさ。短すぎる場合はパディング文字がその大きさを満たすために使われる。
// ピリオドと小数：小数点以下を何桁にするか。
// 値の種類：修飾子の後につける。十進数はd、文字列はs、浮動小数点数はf、など。

// printf()で価格（price）をフォーマット
$price = 5;
$tax = 0.075;
printf('The dish costs $%.2f, $price * (1 + $tax)');

// printf()でゼロ埋めをする
$zip = '6520';
$month = 2;
$day = 6;
$year = 2007;

printf("ZIP is %05d and the date is %02d/%02d/%d", $zip, $month, $day,  $year);

// 符号修飾子は正と負を明示的に示す
$min = -40;
$max = 40;
printf("The computer can operate between %+d and %+d degrees Celsius.", $min, $max);

// strtolower()関数は、文字列を小文字にします。

print strtolower('Beef, CHICKEN, Pork, duCK');

// strtoupper()関数は、文字列を大文字にします。

print strtoupper('Beef, CHICKEN, Pork, duCk');

// ucwords()関数は、文字列の中のそれぞれの単語の最小の文字を大文字にします。
// 全て大文字の名前から、上手にキャピタライズした名前を生成するためには、strtolowe()と組み合わせると便利です。

print ucwords(strtolower('JOHN FRANKENHEIMER'));

// substr()関数を使って、文字列の一部を切り出す

// $_POST['comments']最初の30文字を抜き出す
print substr($_POST['comments'], 0, 30);
// 省略記号を追加
print '...';

// substr()に負の開始位置を与えた場合、文字列の最後から逆向きに文字列を数えて、開始点を決めます。
// substr()で文字列の終わりを抽出する。

print 'Card: XX';
print substr($_POST['card'], -4, 4);

// str_replace()関数は、部分文字列を抽出する変わりに、文字列の一部分を書き換えます。

$my_class = 'launch';
print str_replace('{class}', $my_class,
    '<span class="{class}">Fried Bean Curd</span>
    <span class="{class}">Oil-Soaked Fish</span>');

?>

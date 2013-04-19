<?php
/**
 * 関数へ引数を渡す
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/19
 * Time: 13:30
 * To change this template use File | Settings | File Templates.
 */

// 引数といっしょに関数を宣言する

function page_header2($color) {
    print '<html><head><title>Welcome to my site</title></head></html>';
    print '<body bgcolor="' . $color .'">';
}

page_header2('cc00cc');

// デフォルト値を指定する

function page_header3($color = 'cc3399') {
    print '<html><head><title>Welcome to my site</title></head></html>';
    print '<body bgcolor="' . $color .'">';
}

/*

// これは間違い：デフォルト値を変数にはできない
$my_color = '#000000';
function page_haeder_bad($color = $my_color) {
    print '<html><head><title>Welcome to my site</title></head></html>';
    print '<body bgcolor="' . $color .'">';
}

*/

// 引数を２つ持つ関数を定義する

function page_header4($color, $title) {
    print '<html><head><title>Welcome to ' . $title . '</title></head></html>';
    print '<body bgcolor="' . $color .'">';
}

// ２つの引数の関数を呼び出す

page_header4('66cc66', 'my homepage');

// オプションの引数が１つ：その引数は最後でなければならい

function page_header5($color, $title, $header = 'Welcome') {
    print '<html><head><title>Welcome to' . $title . '</title></head></html>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}

// この関数の可能な呼び出し方

page_header5('66cc99', 'my wonderful page'); // デフォルトの$headerを使う
page_header5('66cc99', 'my wonderful page', 'This page is great!'); // デフォルトはない

// オプションの引数が２つ：２つの引数は最後でなければならない

function page_header6($color, $title = 'the page',  $header = 'Welcome') {
    print '<html><head><title>Welcome to' . $title . '</title></head></html>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}

// この関数の可能な呼び出し方
page_header6('66cc99'); // デフォルトの$titleと$headerを使う
page_header6('66cc99', 'my wonderful page'); // デフォルトの$headerを使う
page_header6('66cc99', 'my wonderful page', 'This page is great!');

// すべてオプションの引数

function page_header7($color = '336699', $title = 'the page',  $header = 'Welcome') {
    print '<html><head><title>Welcome to' . $title . '</title></head></html>';
    print '<body bgcolor="#' . $color . '">';
    print "<h1>$header</h1>";
}
// この関数の可能な呼び出し方
page_header7(); // すべてデフォルトを使う
page_header7('66cc99'); // デフォルトの$titleと$headerを使う
page_header7('66cc99', 'my wonderful page'); // デフォルトの$headerを使う
page_header7('66cc99', 'my wonderful page', 'This page is great!'); // デフォルトはない

// 引数の値を変更する

function countdown($top) {
    while ($top > 0) {
        print "$top...";
        $top--;
    }
    print "boom!\n";
}

$counter = 5;
countdown($counter);
print "Now, counter is $counter";

function countdown1($counter) {
    while ($counter > 0) {
        print "$counter...";
        $counter--;
    }
    print "boom!\n";
}

$counter = 5;
countdown1($counter);
print "Now, counter is $counter";


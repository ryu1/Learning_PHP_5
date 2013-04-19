<?php
/**
 * 関数の宣言と呼び出し
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/19
 * Time: 13:21
 * To change this template use File | Settings | File Templates.
 */

// 関数の宣言

function page_header() {
    print '<html><head><title>Welcome to my site</title></head></html>';
    print '<body bgcolor="#ffffff">';
}

// 関数の呼び出し
page_header();
print "Welcome, $user";
page_footer();

// 呼び出しの前かあとで関数を定義する
function page_footer() {
    print '<hr>Thanks for visiting.';
    print "</body></html>";
}


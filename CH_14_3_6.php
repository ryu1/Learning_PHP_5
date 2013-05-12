<?php
/**
 * フォームの処理
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 1:01
 * To change this template use File | Settings | File Templates.
 */

if (array_key_exists('my_name', $_POST)) {
    process_form();
}
else {
    show_form();
}

function process_form() {
    $name = htmlspecialchars($_POST['my_name'], ENT_QUOTES, 'UTF-8');
    print "$name さん、こんにちは<hr/>";
    print "入力文字エンコーディング: " . mb_http_input();
    print "文字エンコーディング:" . mb_detect_encoding($name);
}

function show_form() {
    print <<<_HTML_
<form method="POST" action="">
your name: <input type="text" name="my_name">
<input type="submit" value="Say Hello"
</form>
_HTML_;
}
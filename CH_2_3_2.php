<?php
/**
 * 文字列の中に変数を置く
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 15:11
 * To change this template use File | Settings | File Templates.
 */

// 変数の補完

$email = 'jacob@example.com';
print "Send replies to: $email";

// ヒアドキュメントの中に補完する

$page_title = 'Menu';
$meat = 'pork';
$vegetable = 'bean sprout';

print <<<MENU
<html>
<head><title>$page_title</title></head>
<body>
<ul>
  <li> Barbecued $meat
  <li> Sliced $meat
  <li> Braised $meat with $vegetable
</ul>
</body>
</html>
MENU;

// 中括弧で過去って補完
$preparation = 'Braise';
$meat = 'Beef';

print "{$preparation}d $meat with Vegetables";

%>
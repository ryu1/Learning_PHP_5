<?php
/**
 * メールの送信
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 23:38
 * To change this template use File | Settings | File Templates.
 */

// メール送信の例

$name = "鈴木タロウ";

$to = mb_encode_mimeheader($name) . " <taro@example.com>";

$subject = "ごあいさつ";

$body = "こんにちは、$name さん";

mb_send_mail($to, $subject, $body);
<?php
/**
 * メールの送受信
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */

// mail()でメッセージを送信

$mail_body = <<<_TXT_
your order is:
* 2 Fried Bean Curd
* 1 Eggplant with Chili Sauce
* 3 Pineapple with Yu Fungus
_TXT_;

mail('hungry@example.com', 'Your Order', $mail_body);


// テキストとHTMLの本文でメッセージを送信

require 'Mail.php';
require 'Mail/mine.php';

$headers = array('From' => 'orders@example.com',
                    'Subject' => 'Your Order');

$text_body = <<<_TXT_
your order is:
* 2 Fried Bean Curd
* 1 Eggplant with Chili Sauce
* 3 Pineapple with Yu Fungus
_TXT_;

$html_body = <<<_HTML_
<p>Your order is:</p>
<ul>
  <li><b>2</b> Fried Bean Curd</li>
  <li><b>1</b> Eggplant with Chili Sauce</li>
  <li><b>3</b> Pineapple with Yu Fungus</li>
</ul>
_HTML_;

$mine = new Mail_mime();
$mine->setTXTBody($text_body);
$mine->setHTMLBody($html_body);

$msg_body = $mine->get();
$msg_headers = $mine->_headers($headers);

$mailer = $mail_body::factory('mail');

$mailer->send('hungry@example.com', $msg_headers, $msg_body);
<?php
/**
 * ブラウザ特有のコード
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 14:46
 * To change this template use File | Settings | File Templates.
 */

// get_browser()を使用する

$browser = get_browser();

if ($browser->platform == 'WinXP') {
    print 'You are using Windows XP.';
}
elseif ($browser->platform == 'MacOSX') {
    print 'You are using Mac OS X.';
}
else {
    print 'you are using a different operation system.';
}
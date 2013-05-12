<?php
/**
 * ファイルパーミッションを点検する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/28
 * Time: 17:40
 * To change this template use File | Settings | File Templates.
 */

// ファイルの存在する

if (file_exists('/usr/local/htdocs/index.html')) {
    print 'Index file is there.';
} else {
    print 'No index file in /usr/local/htdocs/.';
}

// 読み込みパーミッションのテストをする
$template_file = 'page-template.html';
if (is_readable($template_file)) {
    $template = file_get_contents($template_file);
} else {
    print "Can't read template file.";
}

// 書き出しパーティションのテストをする

$log_file = '/var/log/users.log';

if (is_writeable($log_file)) {
    $fh = fopen($log_file, 'ab');
    fwrite($fh, $_SESSION['username'] . ' at' . strftime('%c') . "¥n");
    fclose($fh);
} else {
    print "Can't write to log file.";
}
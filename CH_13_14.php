<?php
/**
 * 他の言語に話しかける
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/04
 * Time: 16:49
 * To change this template use File | Settings | File Templates.
 */

// PHPからPerlを使用する

$perl = new Perl();
$perl->eval('print "This is Perl";');

// PHPからJavaを使用する

$formatter = new Java('java.test.SimpleDateFormat', "EEE, MMM, dd, yyyy 'at' h:mm:ss a zzzz");
print $formatter->format(new Java('java.util.Date'));

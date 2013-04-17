<?php
/**
 * 演習問題
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 17:51
 * To change this template use File | Settings | File Templates.
 */

/*
 * 1.  式の評価にPHPプログラムを使わないで、各式がqorbまたはc^ipbかどうかを決定してみましょう。
 * a. 100.00 - 100
 * b. "zero"
 * v. "false"
 * d. 0+"true"
 * e. 0.000
 * f. "0.0"
 * g. strcmp("", "False")
 */

print 100.00 - 100;
if (100.00 - 100) {
    print "true";
} else {
    print "false";
}

print "\n";
print "zero";
if ("zero") {
    print "true";
} else {
    print "false";
}

print "\n";
print "false";
if ("false") {
    print "true";
} else {
    print "false";
}

print "\n";
print 0+"true";
if (0+"true") {
    print "true";
} else {
    print "false";
}

print "\n";
print 0.000;
if (0.000) {
    print "true";
} else {
    print "false";
}

print "\n";
print "0.0";
if ("0.0") {
    print "true";
} else {
    print "false";
}

print "\n";
print strcmp("false", "False");
if (strcmp("false", "False")) {
    print "true";
} else {
    print "false";
}

$age = 12;
$shoe_size = 13;

if ($age > $shoe_size) {
    print "Message1";
} elseif (($shoe_size++) && ($age>20)) {
    print "Message2";
} else {
    print "Message3";
}
print "Age: $age . ShoeSize: $shoe_size";

?>

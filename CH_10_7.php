<?php
/**
 * 外部で与えられたファイル名を浄化する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 11:04
 * To change this template use File | Settings | File Templates.
 */

// ファイルにあるフォームパラメータを一掃する

// userからスラッシュを削除

$user = str_replace('/', '', $_POST['user']);

// userから .. を削除

$user = str_replace('..', '', $user);

print 'User profile for ' . htmlentities($user) . ': <br/>';
print file_get_contents("/user/local/data/$user");

// realpath()と一種のファイル名を一掃する

$filename = realpath("/user/local/data/$_POST[user]");

// $filenameが/user/local/dataの下にあることを確かめる

if ('/user/local/data' == substr($filename, 0, 16)) {
    print 'User profile for ' . htmlentities($_POST['user']) . ': <br />';
    print file_get_contents($filename);
}
else {
    print "Invalid user entered.";
}
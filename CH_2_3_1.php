<?php
/**
 * 変数の操作
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 14:39
 * To change this template use File | Settings | File Templates.
 */

// 代入と加算の組み合わせ
$price = $prince + 3;
$price += 3;

// 組み合わせ代入と結合
$username = 'james';
$domain = '@example.com';

// 普通のよあり方で$domainを$usernameに結合する
$username = $username . $ $domain;

// 複合演算子で結合する
$username .= $domain;

// $birthdayに1を加える。
$birthday = $birthday + 1;

// $birthdayに更に1を加える
++$birthday;

// $years_leftから1を引く
$years_left = $years_left - 1;

// $years_leftからさらに1を引く
--$years_left;

?>
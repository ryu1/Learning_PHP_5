<?php
/**
 * 暗号化
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/04
 * Time: 16:37
 * To change this template use File | Settings | File Templates.
 */

// mcriptで暗号化と復号化を行う

// 暗号化する文字列
$data = 'Account number: 123-123123-12 PIN: 123';

// 暗号化するときの秘密鍵
$key = "Perhaps Looking-glass milk isn't good to drink";

// アルゴリズムと暗号化モードを選択する
$algorithum = MCRYPT_BLOWFISH;
$mode = MCRYPT_MODE_CBC;

// 初期ベクトルを作成する
$iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithum, $mode), MCRYPT_DEV_URANDOM);

// データを暗号化する
$encrypted_data = mcrypt_encrypt($algorithum, $key, $data, $mode, $iv);
print $encrypted_data;

// データを復号化する
$decrypted_data = mcrypt_decrypt($algorithum, $key, $encrypted_data, $mode, $iv);
print $decrypted_data;

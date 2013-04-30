<?php
/**
 * データベースの修正
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 13:39
 * To change this template use File | Settings | File Templates.
 */

// 関数を扱うカスタムデータベースエラーを設定する

$db->setErrorHandling(PEAR_ERROR_CALLBACK, 'database_error');

// カスタムデータベースエラーハンドリング関数

function database_error($error_object) {
    print "We're sorry, but there is a temporary problem with the database.";
    $detailed_error = $error_object->getDebugInfo();
    error_log($detailed_error);
}
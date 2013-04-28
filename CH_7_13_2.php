<?php
/**
 * PDOによるデータベースの操作
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/23
 * Time: 18:44
 * To change this template use File | Settings | File Templates.
 */

$limit = 10;

try {

    $db = new PDO('sqlite::memory');

    // 通常のクエリを行う場合
    $stmt = $db->query('SELECT * FROM test LIMIT ' . $db->quote($limit));

    // プリペアードステートメントを利用する場合
    $stmt = $db->prepare('SELECT * FROM test');

} catch (PDOException $e) {
    die('Cannot connect: ' + $e->getMessage());
}
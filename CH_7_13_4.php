<?php
/**
 * PDOによるプリペアードクエリの実行
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/23
 * Time: 19:03
 * To change this template use File | Settings | File Templates.
 */

// SQLite3のPDOオブジェクト
$pdo = new PDO('sqlite:/tmp/test.sql3');

// テストテーブル作成

$pdo->exec('CREATE TABLE test (type, int);');
$pdo->exec('INSERT INTO test (type) VALUES (1)');
$pdo->exec('INSERT INTO test (type) VALUES (3)');

// プリペアードクエリ

$sql = 'SELECT * FROM test WHERE type = :type1 OR type = :type2';

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':type1' => 1,
    ':type2' => 2));

// 結果の取得

$records = $stmt->fetchAll();
?>

<?php
/**
 * 疑問符パラメータ
 */

// SQLite3のPDOオブジェクト
$pdo = new PDO('sqlite:/tmp/test.sql3');
// テストテーブル作成
$pdo->exec('CREATE TABLE test (type, int);');
$pdo->exec('INSERT INTO test (type) VALUES (1);');
$pdo->exec('INSERT INTO test (type) VALUES (3)');
// プリペアードクエリ
$sql = 'SELECT * FROM test WHERE type = ? OR type = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute(array(1, 2));
// 結果の取得
$records = $stmt->fetchAll();
?>

<?php

try {
    // SQLite3のPDOオブジェクト
    $pdo = new PDO('sqlite:/tmp/test.sql3');
// テストテーブル作成
    $pdo->exec('CREATE TABLE test (type, int);');
    $pdo->exec('INSERT INTO test (type) VALUES (1);');
    $pdo->exec('INSERT INTO test (type) VALUES (3)');
// プリペアードクエリ
    $sql = 'SELECT * FROM test WHERE type = ? OR type = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(1, 2));
// 結果の取得
    $records = $stmt->fetchAll();
} catch (PDOException $e) {
    var_dump($e);
}

?>
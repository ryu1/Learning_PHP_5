<?php
/**
 * PDOによるクエリの実行
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/23
 * Time: 18:55
 * To change this template use File | Settings | File Templates.
 */

$conn = new PDO('sqlite:./test.sql3');

/* Simple string */
$string = 'It\'s a nice day!';
print "Unquoted string: $string \n";

print "Quoted string: " . $conn->quote($string) . "\n";
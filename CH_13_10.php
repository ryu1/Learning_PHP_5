<?php
/**
 * SQLite
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/05/01
 * Time: 11:05
 * To change this template use File | Settings | File Templates.
 */

// SQLiteデータベースを使用する

require 'MDB2.php';

$db = MDB2::connect('sqlite://:@localhost/restaurant.db');
if (MDB2::isError()) {
    die("Can't connect: " . $db->getMessage());
}

$db->setErrorHandling(PEAR_ERROR_DIE);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$dishes = $db->getAll('SELECT dish_name, price from dishes order by prices');
if (count($dishes) > 0) {
    print '<ul>';
    foreach($dishes as $dish) {
        print "<li> $dish[dish_name] ($dish[price])</li>";
    }
    print '</ul>';
}
else {
    print "No dishes available.";
}
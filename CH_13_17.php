<?php
/**
 * PHP-GTK
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/04
 * Time: 17:13
 * To change this template use File | Settings | File Templates.
 */

// PHP-GTKでボタンを表示します

$window =& new GtkWindow();

$button =& new GtkButton('I am a button, please click me.');
$window->add($button);
$window->show_all();

function shutdown() {
    gtk::main_quit();
}

$window->connect('destroy', 'shutdown');

gtk::main();
<?php
/**
 * 置換
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/12
 * Time: 15:18
 * To change this template use File | Settings | File Templates.
 */

// preg_replace()で置換する

$member =<<<TEXT
Name              E-Mail Address
---------------------------------------------
inky T. Ghost     inky@pacman.example.com
Donkey K. Gorilla kong@banana.example.com
Mario A. plumber  mario@franchise.example.com
Bentley T. Beer   bb@xtal-castles.example.com
TEXT;

print preg_replace('/[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}/', '[ address removed ]', $member);

// 逆引きを使って置換する

print preg_replace('/([^@\s]+)@(([-a-z0-9]+\.)+[a-z]{2,})/',
    '\\1 at \\2', $member);


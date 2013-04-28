<?php
/**
 * 日付または時刻は表示する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/24
 * Time: 19:32
 * To change this template use File | Settings | File Templates.
 */

// 何時ですか？

print 'strftime() says: ';
print strftime('%c');
print "\n";

print 'date() says: ';
print date('r');

// date()でフォーマットされた日付の文字列を出力する

print date('m/d/y');

// strftime()でフォーマットされた日付の文字列を出力する

print strftime('%m/%d/%y');

// 特定時間をフォーマットした時間の文字列で出力する

print 'strftime says(): ';
print strftime('%I:%M:%S', time() + 60 * 60);
print "\n";
print date('h:i:s', time() + 60 * 60);

// 他のテキストでフォーマットされた時間の文字列を出力する

print 'strftime() says: ';
print strftime('Today is %m/%d/%y and the time is %I:%M:%S');
print "\n";
print 'date() says: ';
print 'Today is ' . date('m/d/y') . ' and the time is ' . date('h:i:s');

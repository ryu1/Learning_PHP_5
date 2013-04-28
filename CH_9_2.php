<?php
/**
 * 日付と時刻をパースする
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/25
 * Time: 15:42
 * To change this template use File | Settings | File Templates.
 */

// エポックタイムスタンプを作成する

$user_date = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year']);

// 1982年10月20日の午後1時30分（と45秒）
$afternoon = mktime(13, 30, 45, 10, 20, 1982);

print strftime('At %I:%M:%S on %m/%d/%y', $afternoon);
print "$afternoon seconds have elapsed since 1/1/1970.";

// strtotime()を使う

$now = time();

$later = strtotime('Thursday', $now);

$before = strtotime('last thursday', $now);

print strftime("now: %c \n", $now);
print strftime("later: %c \n", $later);
print strftime("before: %c \n", $before);

// エポックタイムスタンプの開始にstrtotime()を使う

// 2008年11月1日のエポックタイムスタンプを見つける
$november = mktime(0, 0, 0, 11, 1, 2008);
// 2008年11月1日以降の最初の月曜日を見つける
$monday = strtotime('Monday', $november);
// 見つけた最初の別曜日の次の火曜日にスキップする
$electoin_day = strftime('+1 day', $monday);

print strftime('Election day is %A, %B, %d, %Y', $election_day);
<?php
/**
 * 1日につき1回選択の単一メニュー
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/25
 * Time: 16:05
 * To change this template use File | Settings | File Templates.
 */

// 日付選択の<select>メニュー

$midnight_today = mktime(0, 0, 0);

print '<select name="date">';

for ($i = 0; $i < 7; $i++) {
    $timestamp = strtotime("+$i day", $midnight_today);
    $display_date = strftime('%A, %B %d, %Y', $timestamp);
    print '<option value="' . $timestamp . '">' . $display_date . "</option>\n";
}
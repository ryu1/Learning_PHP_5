<?php
/**
 * 最長一致
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/12
 * Time: 2:04
 * To change this template use File | Settings | File Templates.
 */

// 最長一致と最短一致での照合

$meats = "<b>Chichen</b>, <b>Beaf</b>, <b>Duck</b>";

// 最短一致の数量詞で、それぞれの肉は別々に一致する

preg_match_all('@<b>.*?</b>@', $meats, $matches);

foreach($matches[0] as $meat) {
    print "Meat A: $meat" . PHP_EOL;
}

// 最長一致の数量詞で、すべての文字列が一度でマッチさせられる

preg_match_all('@<b>.*</b>@', $meats, $matches);

foreach($matches[0] as $meat) {
    print "Meat A: $meat" . PHP_EOL;
}
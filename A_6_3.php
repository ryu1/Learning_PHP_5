<?php
/**
 * 配列処理
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/12
 * Time: 15:41
 * To change this template use File | Settings | File Templates.
 */

// preg_split()を使う

$sea_creatures = "cucumber;jellyfish, conger eel,shrimp, carb roe; bluefish";

// カンマとセミコロンに続いてオプションでスペースのあるところで文字列を分離する
$creature_list = preg_split('/[,;] ?/', $sea_creatures);
print "Would you like some $creature_list[2]?";

// preg_split()で返される要素の数を限定する
// 文字列を最大３つの要素に分離する

$creature_list = preg_split('/, ?/', $sea_creatures, 3);
print "The last element is $creature_list[2]";



// preg_split()で空要素を捨てる

$text =<<<TEXT
"It's time to ring again," said Tom rebelliously.
"I agree! I'll help you ," said Jerry resoundingly.
TEXT;

// $textの中のそれぞれの単語を取得して、しかし、ホワイトスペースと句読点は覗いて、$wordsに入れる。
// -1を制限引数に「制限なし」の意味として与える

$words = preg_split('/[",.!\s]/', $text, -1, PREG_SPLIT_NO_EMPTY);

print 'There are ' . count($words) . ' words in the text.';



// preg_grep()を使う
// 重複する文字を含む単語を見つける
$double_letter_words = preg_grep('/([a-z])\\1/i', $words);

foreach ($double_letter_words as $words) {
    print "$words\n";
}

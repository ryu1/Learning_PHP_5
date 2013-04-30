<?php
/**
 * テキスト文字列の定義
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/16
 * Time: 13:19
 * To change this template use File | Settings | File Templates.
 */

// PHPプログラムの中で文字列を指示する最も簡単な方法は、文字列を単一引用符（single quote）で囲むことです。

print 'I would like bowl of soup';
print 'chicken';
print '06520';
print '"I am eating dinner," he growled.';

// 単一引用符で囲まれた文字列のなかで単一引用符を使いたい場合は、バックスラッシュを単一引用符の前に置きます。

print 'We\'ll each have a bowl of soup.';

// エスケープ文字はそれ自信をエスケープすることができます。

print 'Use a \\ to escape in a string';

// 改行を含む空白文字を単一引用符で囲んで文字列に含めることができます。

print '<ul>
<li>Beef Chow-Fun</li>
<li>Sauteed Pea Shoots</li>
<li>Soy Sauce Noodles</li>
</ul>';

// 二重引用符で囲まれた文字列の中に変数名を含めると、変数が値に置き換えられた文字列となります。

$user = 'Bill';

print "Hi $user";
print 'Hi $user';

// ヒアドキュメントは、<<<と区切りの単語では始め、区切りの単語と同じ単語が行頭に来ると、その文字列は終わります。
// 区切りには、、アルファベット文字、数字、アンダースコア文字を使うことができます。
// ヒアドキュメントの終わりを示す区切りの行は、それだけを書くようにしなくては行けません。
// 区切りには、字下げをしたり、空白やコメント、あるいは、その他の文字を入れてはいけません。
// 唯一の例外は、文の終わりを示すためのセミコロンだけは区切りの直後に置くことができることです。
// この場合、同じ行のセミコロンの後ろには何も書いてはいけません。
// ヒアドキュメントは、二重引用符で囲まれた文字列と同じように、変数置き換えの規則とエスケープ文字に従います。

print <<<HTMLBLOCK
<html>
<head><title>Menu</title></head>
<body bgcolor="#fffed9">
<h1>Dinner</h1>
<ul>
  <li> Beef Chow-Fum
  <li> Sauteed Pea Shoots
  <li> Soy Sauce Noodles
</ul>
</body>
</html>
HTMLBLOCK;


// ２つの文字列を結合するときは、文字列結合演算子の.（ピリオド）を追加ます。

print 'bread' . 'fruit';
print "It's a beautiful day  " . 'in the neighborhood.';
print "The price is; " . '$3.95';
print 'Inky' . 'Pinky' . 'Blinky' . 'Clyde';

?>
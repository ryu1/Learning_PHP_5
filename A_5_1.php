<?php
/**
 * 照合（マッチング）
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/12
 * Time: 13:19
 * To change this template use File | Settings | File Templates.
 */

// preg_match()での照合

// パターン^¥d{5}(-¥d{4})?$に対して$_POST['zip']
// の値をテストする

if (preg_match('^¥d{5}(-¥d{4})?$', $_POST['zip'])) {
    print $_POST['zip'] . ' is a valid US ZIP Code';
}

// パターン<b>[^<]+</b>に対して$htmlの値をテストする

// /がパターンの中にあるので区切り文字は@
$is_bold = preg_match('@<b>[^<]+</b>@', $html);



// preg_match()で補足する

// パターン^¥d{5}(-¥d{4})?$に対して$_POST['zip']
// の値をテストする

if (preg_match('/^¥d{5}(-¥d{4})?$/', $_POST, $matches)) {
    // $matches[0]は、zipをまるごと含む
    print "$matches[0] is a valid US ZIP Code¥n";

    // $matches[1]は、最初のカッコの組みの内部の5桁の数字部分を含む
    print "$matches[1] is the five-digit part of the ZIP Code¥n";

    // 文字列にそれが記されていれば、ハイフンとZIP+4の数字が$matches[2]に含まれる
    if (isset($matches[2])) {
        print "The ZIP+4 is $matches[2]";
    }
    else {
        print "There is no ZIP+4";
    }
}

// パターン<b>[^<]+</b>に対して$htmlの値をテストする。/がパターンの中にあるので区切り文字は@

$is_bold = preg_match('@<b>[^<]+</b>@', $html, $matches);

if ($is_bold) {
    // $matches[1]には太字のタグの内側のものが含まれる
    print "The bold text is: $matches[1]";
}



// ネストした括弧で補足する

if (preg_match('/^(¥d{5})(-(¥d{4}))?$/', $_POST['zip'], $matches)) {
    print "The beginning of the ZIP Code is : $matches[1]¥n";
    // $matches[2]は、２つ目の括弧の組みの中のものを含む
    // ハイフンと最後の４つの数字
    // $matches[3]は最後の4桁の数だけを含む
    if (isset($matches[2])) {
        print "The ZIP+4 is: $matches[3]";
    }
}

// preg_match_all()で照合

$html = <<<_HTML_
<ul><li>Beef Chow-Fun</li>
<li>Sauteed Pea Shoots</li>
<li>Soy Sauce Noodles</li>
</ul>
_HTML_;

preg_match('@<li>(.*?)</li>@', $html, $matches);
$match_cout = preg_match_all('@<li>(.*?)</li>@', $html, $matches_all);

print "preg_match_all() matched $match_count times." . PHP_EOL;

print "preg_match() array: ";
var_dump($matches);

print "preg_match_all() array: ";
var_dump($matches_all);



// 逆引きを使ってマッチング

$ok_html = "I <b>love</b> shrimp dumplings.";
$bad_html = "I <b>love</i> shrimp dumplings.";

if (preg_match('@<([bi])>.*?</\1>@', $ok_html)) {
    print "1 Good for you! (OK, Backreferences)\n";
}

if (preg_match('@<([bi])>.*?</\1>@', $bad_html)) {
    print "2 Good for you! (Bad, Backreferences)\n";
}

if (preg_match('@<[bi]>.*?</[bi]>@', $ok_html)) {
    print "3 Good for you! (OK, Backreferences)\n";
}

if (preg_match('@<[bi]>.*?</[bi]>@', $bad_html)) {
    print "4 Good for you! (Bad, Backreferences)\n";
}


<?php
/**
 * XMLドキュメントをパースする
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 11:20
 * To change this template use File | Settings | File Templates.
 */

// 文字列の中のXMLをパースする

$channel = <<<_XML_
<channel>
  <title>What's For Dinner</title>
  <link>http://menu.example.com/</link>
  <description>There are your choices of what to eat tonight.</description>
</channel>
_XML_;

$xml = simplexml_load_string($channel);

// XML要素内容を出力する

print "The $xml->title channel is available at $xml->link. ";
print "The description is \"$xml->description\"";

// 2次元要素の内容を出力する

$menu = <<<_XML_
<?xml version="1.0" encoding="utf-8" ?>
<rss version="0.91">
  <channel>
    <title>What's For Dinner</title>
    <link>http://menu.example.com/</link>
    <description>These are your choices of what to eat tonight.</description>
    <item>
      <title>Braised Sea Cucumber</title>
      <link>http://menu.example.com/dishes.php?dish=cuke</link>
      <description>Gentle flavors of the sea that nourish and refresh you.</description>
    </item>
    <item>
      <title>Baked Giblets with Salt</title>
      <link>http://menu.example.com/dishes.php?dish=giblets</link>
      <description>Rich giblet flavor infused with salt and spice.</description>
    </item>
    <item>
      <title>Abalone with Marrow and Duck Feet</title>
      <link>http://menu.example.com/dishes.php?dish=abalone</link>
      <description>There's no mistaking the special pleasure of abalone.</description>
    </item>
  </channel>
</rss>
_XML_;


$xml = simplexml_load_string($menu);

print "The {$xml->channel->title} channel is available at {$xml->channel->link}.";
print "The description is \"{$xml->channel->description}\"";

// XML要素属性を出力する

print 'This RSS feed is version ' . $xml['version'];

// 同じ名前の要素にアクセスする

print "Title: " . $xml->channel->item[0]->title . "\n";
print "Title: " . $xml->channel->item[1]->title . "\n";
print "Title: " . $xml->channel->item[2]->title . "\n";

// foreach()で同じ名前の要素をループする

foreach($xml->channel->item as $item) {
    print "Title: " . $item->title . "\n";
}

// foreach()で子供の要素をループする

foreach($xml->channel->item[0] as $element_name => $content) {
    print "The $element_name is $content\n";
}

// 要素と属性を変更する

$xml['version'] = '6.3';

$xml->channel->title = strtoupper($xml->channel->title);

for ($i = 0; $i < 3; $i++) {
    $xml->channel->item[$i]->link = str_replace('menu.example.com', 'dinner.example.org', $xml->channel->item[$i]->link);
}

// XMLドキュメント全体を出力する

print $xml->asXML();

// XMLのページタイプを変更する

header('Content-Type: text/xml');

// ファイルからXMLドキュメントをロードする

$xml = simplexml_load_file('menu.xml');

// リモートのXMLドキュメントをロードする

$xml = simplexml_load_file('http://rss.news.yahoo.com/rss/oddlyenough');
print "<ul>\n";

foreach ($xml->channel->item as $item) {
    print "<li>$item->title</li>\n";
}
print "</ul>";

// XMLドキュメントをファイルに保存する

$xml = simplexml_load_file('http://rss.news.yahoo.com/rss/oddlyenough');
$xml->asXML("odd.xml");
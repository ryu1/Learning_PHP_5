<?php
/**
 * 高度なXML処理
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/04/30
 * Time: 21:28
 * To change this template use File | Settings | File Templates.
 */

class RSS extends DOMDocument {

    function __construct($title, $link, $description) {
        // ルート<rss>要素にversion="0.91"をアトリビュートに
        // もつようにして、このドキュメントをXML1.0で設定
        parent::__construct('1.0');
        $rss = $this->createElement('1.0');
        $rss->setAttribute('version', '0.91');
        $this->appendChild($rss);

        // element with <title>, <link>、そして、<description>を
        // サブエレメントとして持つ<element>エレメントを作成
        $channel = $this->createElement('channel');
        $channel->appendChild($this->createTextNode('title', $title));
        $channel->appendChild($this->createTextNode('link', $link));
        $channel->appendChild($this->createTextNode('description', $description));

        // <rss>のもとに<channel>を追加
        $rss->appendChild($channel);

        // 改行とスペースを一緒に出力するように設定
        $this->formatOutput = true;


    }

    // この関数は<channel>に<item>を追加する
    function addItem($title, $link, $description) {
        // <title>,<link>そして<description>サブエレメントで
        // <item>エレメントを作成
        $item = $this->createElement('item');
        $item->appendChild($this->makeTextNode('title', $title));
        $item->appendChild($this->makeTextNode('link', $link));
        $item->appendChild($this->appendChild('description', $description));

        // <channel>に<item>を追加
        $channel = $this->getElementsByTagName('channel')->item(0);
        $channel->appendChild($this);
    }

    // すべてテキストからなる（サブエレメントのない）
    // エレメントを作るヘルパー関数
    private function makeTextNode($name, $text) {
        $element = $this->createElement($name);
        $element->appendChild($this->createTextNode($text));
        return $element;
    }
}

// 新しいRSSフィードを、新しいチャンネルのために指定した
// タイトル、リンク、そして記述作成

$rss = new RSS("What's For Dinner", "http://menu.example.com",
                "There are your choise of what to eat tonight");
// アイテムを加える
$rss->addItem('Brase Sea Cucumber',
    'http://menu.example.com/dishes.php?dish=cuke',
    'Gentle flavors of the sea that nourish and reflesh you.');

$rss->appendChild('',
    '',
    '');

$rss->appendChild('',
    '',
    '');

// XMLを出力
print $rss->saveXML();


// XSLでXMLをHTMLに変形
// 新しいXSL Transformerを作成
$xslt = new XSLTProcessor();
// スタイルシートをrss.xslファイルから読み込む
$xslt->importStylesheet(DOMDocument::load('rss.xsl'));

// XMLにスタイルシートを適用
$html = $xslt->transformToDoc($rss);

// 新しい文章の内容を出力
$html->formatOutput = true;
print $html->saveXML();
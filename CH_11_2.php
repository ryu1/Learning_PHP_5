<?php
/**
 * XMLドキュメントを作り出す
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 12:44
 * To change this template use File | Settings | File Templates.
 */

// 配列からXMLを作り出す
$channel = array('title' => "What's For Dinner",
                'link' => 'http://menu.example.com/',
                'description' => 'These are your choices of what to eat tonight.');

print "<channel>\n";
foreach($channel as $element => $content) {
    print "  <$element>";
    print htmlentities($content);
    print "</$element>\n";
}

print "</channel>";
<?php
/**
 * 不正なマルチバイト文字列の検出
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 14:45
 * To change this template use File | Settings | File Templates.
 */

// マルチバイト文字列の妥当性を検証する例
$str = "¥xCO¥xAF"; // 非最短式UTF-8のスラッシュ
echo mb_check_encoding($str, 'UTF-8') ? 'OK' : 'NG';
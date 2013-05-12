<?php
/**
 * 文字エンコーディングの相互変換
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/05
 * Time: 14:41
 * To change this template use File | Settings | File Templates.
 */

// 文字エンコーディングの変換の例

$name = "鈴木タロウ";
print mb_convert_encoding($name, "SJIS");

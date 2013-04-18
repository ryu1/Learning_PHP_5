<?php
/**
 * 配列の作成
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/17
 * Time: 19:43
 * To change this template use File | Settings | File Templates.
 */

// 配列の作成
// 文字列のキーを持つ、$vegetables
$vegetables['corn'] = 'yellow';
$vegetables['beet'] = 'red';
$vegetables['carrot'] = 'orange';

// 数値のキーを持つ$dinnerという配列
$dinner[0] = 'Sweet Corn and Asparagus';
$dinner[1] = 'Lemon Chicken';
$dinner[2] = 'Braised Bamboo Fungus';

// 文字列と数値のキーが混在する$computersという配列
$computers['trs-80'] = 'Radio Shack';
$computers[2600] = 'Atari';
$computers['Adam'] = 'Coleco';

// array()で配列を作成する
$vegetables = array('corn' => 'yellow', 'beet' => 'red', 'carrot' => 'orange');
$dinner = array(0 => 'Sweet Corn and Asparagus',
1 => 'Lemon Chicken',
2 => 'Braised Bamboo Fungus');

$computers = array('trs-80' => 'Radio Shark',
2600 => 'Atari',
'Adam' => 'Coleco');

?>
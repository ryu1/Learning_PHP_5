<?php
/**
 * 高度な演算
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/04
 * Time: 16:22
 * To change this template use File | Settings | File Templates.
 */

// BCMath拡張で計算します

// 各辺は3.5e406と2.8e406

$a = bcmul(3.5, bcpow(10, 406));
$b = bcmul(2.8, bcpow(10, 406));

$a_squared = bcpow($a, 2);
$b_squared = bcpow($b, 2);

$hypotenuse = bcsqrt(bcadd($a_squared, $b_squared));

print $hypotenuse;

// GMP拡張で計算を行う

$a = gmp_mul(35, gmp_pow(10, 405));
$b = gmp_mul(28, gmp_pow(10, 405));

$a_squared = gmp_pow($a, 2);
$b_squared = gmp_pow($b, 2);

$hypotenuse = gmp_sqrt(gmp_add($a_squared, $b_squared));

print gmp_strval($hypotenuse);
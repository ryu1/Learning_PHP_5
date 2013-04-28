<?php
/**
 * クラスとオブジェクト
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 16:24
 * To change this template use File | Settings | File Templates.
 */


class SimpleClass
{
    // プロパティの宣言
    public $var = 'a default value';

    // メソッドの宣言
    public function displayVar() {
        echo $this->var;
    }
}

$simpleClass = new SimpleClass();
$simpleClass -> displayVar();
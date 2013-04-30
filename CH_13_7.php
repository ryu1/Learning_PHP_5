<?php
/**
 * HTML_QuickFormによるフォーム操作のフレームワーク
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */

// QuickFormでフォームを構築

// QuickFormクラスをロード
require 'HTML/QuickForm.php';

// フォームオブジェクトを作成

$form = new HTML_QuickForm();

// 妥当なお菓子と料理の配列をいくつか定義

$sweets = array(
    'puff' => 'Sesame Seed Puff',
    'square' => 'Coconut Milk Gelatin Square',
    'cake' => 'Brown Sugar Cake',
    'ricemeat' => 'Sweet Rice and Meat');

$main_dishes = array(
    'cuke' => 'Braised Sa Cucumber',
    'stomach' => "Sauteed Pig's Stomach",
    'tripe' => 'Sauteed Tripe with Wine Sauce',
    'taro' => 'Stewed Pork with Salt',
    'abalone' => 'Abalone with Marrow and Duck Feet');

// フォーム要素のデフォルト値を設定

$form->setDefaults(
    array(
        'delivery' => 'yes',
        'size' => 'medium'));

// フォームにそれぞれの要素を追加

$form->addElement('text', 'name', 'your Name: ');
$form->addElement('radio', 'size', 'Size: ', 'Small', 'small');
$form->addElement('radio', 'size', '', 'Medium', 'medium');
$form->addElement('radio', 'size', '', 'Large', 'large');
$form->addElement('select', 'sweet', 'Pick one sweet item:', $sweets);
$form->addElement('select', 'main_dish', 'Pick two main dishes:', $main_dishes, 'multiple="multiple');

$form->addElement('radio', 'delivery', 'Do you want your order delivered?', 'Yes', 'yes');
$form->addElement('textarea', 'comments', 'Enter any special instructions. <br/>
                If you want your order deliverd, put your address here:');

$form->addElement('submit', 'save', 'Order');

// 2つのカスタム検証ルールを作成する
// (このスクリプトの終わりに追加した関数を使って実装される)

$form->registerRule('check_array', 'function', 'check_array');
$form->registerRule('check_array_size', 'function', 'check_array_size');

// nameフィールドが必要とされる
$form->addRule('name', 'Please enter your name.', 'required');
// sizeフィールドには、"small", "medium",
// あるいは、"large"のうちどれかの値が必要
$form->addRule('size', 'Please select a size.', 'required');
$form->addRule('size', 'Please select a size.', 'check_array',
    array('small' => 1, 'medium' => 1, 'large' => 1));

// sweetフィールドは$sweets配列のうちのどれかの値が必要
$form->addRule('sweet', 'Please select a valid sweet item.', 'required');
$form->addRule('sweet', 'Please select a valid sweet item.', 'check_array', $sweets);

// main_dishフィールドには、$sweets配列のうちのどれかの値が必要
$form->addRule('main_dish', 'Please select exactly two main dishes.', 'required');
$form->addRule('main_dish', 'Please select exactly two main dishes.', 'check_array_size', 2);
$form->addRule('main_dish', 'Please select exactly two main dishes.', 'check_array', $main_dishes);

// このページのメインロジック：サブミットされたフォームパラメータ
// が妥当であれば、それらを処理して、save_order()関数を実行。
// そうでなければ、フォームを表示

if ($form->validate()) {
    $form->process('save_order');
}
else {
    $form->display();
}

// フォームの処理をする関数。$POSTのかわりに$form_data
// を通してサブ水戸されたパラメータにアクセスする以外は、
// 6章のprocess_form()と全く同じ

function save_order($form_data) {
    // $GLOBALS['sweets']と&GLOBALS['main_dishes']の配列から
    // お菓子（sweet）とメインディッシュの完全な名前を探し出す

    $sweet = $GLOBALS['sweets'][$form_data['sweet']];
    $main_dish_1 = $GLOBALS['main_dishes'][$form_data['main_dish'][0]];
    $main_dish_2 = $GLOBALS['main_dishes'][$form_data['main_dish'][1]];

    if ($form_data['delivery'] == 'yes') {
        $delivery = 'do';
    }
    else {
        $delivery = 'do not';
    }

    // 注文のメッセージの文を作り上げる
    $message=<<<_ORDER_
Thank you for your order, $form_data[name].You requested the $form_data[size] size of $sweet, $main_dish_1, and $main_dish_2.You $delivery want delivery.
_ORDER_;

    if (strlen(trim($form_data['comments']))) {
        $message .= 'Your comments: ' . $form_data['comments'];
    }

    // シェフにそのメッセージを送信
    mail('chef@restaurant.example.com', 'New Order', $message);
    // メッセージを出力するが、HTMLエンティティはエンコードして、
    // 改行は<br />タグに変換
    print nl2br(htmlentities($message));
}

// 検証補助関数は、$param_valueが$arrayの中のキーであること
// （あるいは、$param_valueが配列ならば、$param_valueのそれぞれの値が$arrayのキーであること）をチェック

function check_array($param_name, $param_value, $array) {
    if (is_array($param_value)) {
        foreach($param_value as $submitted_value) {
            if (! array_key_exists($submitted_value, $array)) {
                return false;
            }
        }
        return true;
    }
    else {
        return array_key_exists($param_value, $array);
    }
}

function check_array_size($param_name, $param_value, $size) {
    return count($param_value) == $size;
}
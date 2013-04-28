<?php
/**
 * データ挿入のフォームを完成する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */

// PEAR MDB2をロード
require 'MDB2.php';

// フォームヘルパー関数をロード

require 'formhelpers.php';

// データベースに接続

$db = MDB2::connect('mysql://penguin:top^hat@ec2-175-41-209-150.ap-northeast-1.compute.amazonaws.com/restaurant');
if (MDB2::isError($db)) {
    die("Can't connect:" . $db->getMessage());
}

// 自動エラーハンドリングを設定

$db -> setErrorHandling(PEAR_ERROR_DIE);

// メインページのロジック
// - フォームがサブミットされた、検証してから処理あるいは表示する
// - サブミットされなければ、表示する

if ($_POST['_submit_check']) {
    // validate_form()がエラーを返したら、それをshow_form()へ返す
    if ($form_errors = validata_form()) {
        show_form($form_errors);
    }
    else {
        // サブミットされた値が妥当であれば、それを処理
        process_form();
    }
}
else {
    // フォームがサブミットされなければ、表示
    show_form();
}

function show_form($errors = '') {
    // フォームがサブミットされたら、サブミットされた
    // パラメータからデフォルトを取り出す
    if ($_POST['submit_check']) {
        $defaults = $_POST;
    }
    else {
        // そうだないければ、独自のデフォルトをセット：priceは$5
        $defaults = array('price' => '5.00');
    }

    // エラーが渡されると、$error_textに入れる（HTMLマークアップとともに）

    if (is_array($errors)) {
        $error_text = '<tr><td>You need to correct the following errors:';
        $error_text .= '</td><td><ul><li>';
        $error_text .= implode('</li><li>', $errors);
        $error_text .= '</li></ul></td></tr>';
    }
    else {
        // エラーはない？ならば、$error_textはブランク
        $error_text = '';
    }

    // すべてのhtmlタグをより簡単に表示するために、PHPモードを呼び出す
?>
<form method = "POST" action="<?php print $_SERVER['PHP_SELF']; ?>">
    <table>
        <?php print $error_text ?>
        <tr>
            <td>Dish Name:</td>
            <td><?php input_text('dish_name', $defaults) ?></td>
        </tr>

        <tr>
            <td>Price：</td>
            <td><?php input_text('price', $defaults) ?></td>
        </tr>

        <tr>
            <td>Spicy:</td>
            <td><?php input_radiocheck('checkbox', 'is_spicy', $defaults, 'yes') ?>Yes</td>
        </tr>

        <tr>
            <td colspan="2" align="center"><?php input_submit('save', 'Order'); ?></td>
        </tr>
    </table>
    <input type="hidden" name="_submit_check" value="1" />
</form>
<?php
}

function validate_form() {
    $errors = array();

    // dish_nameが要求される
    if (! strlen(trim($_POST['dish_name']))) {
        $errors[] = 'Please enter the name of the dish.';
    }

    // priceは妥当な小数点数で0より大きくなければならない
    if (floatval($_POST['price'] <= 0)) {
        $errors[] = 'Please enter a valid price.';
    }
    return $errors;
}

function process_form() {
    // このファンクション内で、グローバル変数の$dbにアクセスする
    global $db;

    // この料理のために一意なIDを取得
    $dish_id = $db -> nextID('dishes');

    // $is_spicyの値をチェックボックスをもとに設定
    if ($_POST['is_spicy'] == 'yes') {
        $is_spicy = 1;
    }
    else {
        $is_spicy = 0;
    }

    // 新しい料理をテーブルに挿入
    $sth = $db -> prepare('INSERT INTO dishes (dish_id, dish_name, price, is_spicy) VALUES (?, ?, ?, ?)');
    $sth -> execute( array($dish_id, $_POST['dish_name'], $_POST['price'], $is_spicy) );

    // 料理を追加したことをユーザに伝える
    print 'Added ' . htmlentities($_POST['dish_name']) . ' to the database.';
}

?>
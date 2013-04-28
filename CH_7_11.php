<?php
/**
 * データ取得フォームを完成する
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/22
 * Time: 18:15
 * To change this template use File | Settings | File Templates.
 */
// dishedテーブルを検索するフォーム

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
$db->setErrorHandling(PEAR_ERROR_DIE);

// フェッチモードを設定：行をオブジェクトとする
$db->setFetchMode(MDB2_FETCHMODE_OBJECT);

// フォームのメニューでの"spicy"の選択肢
$spicy_choices = array('no', 'yes', "eithier");

// メインページのロジック：
// - フォームがサブミットされたら、検証してから処理あるいは表示する
// - サブミットされなければ、表示する
if ($_POST['_submit_check']) {
    // validate_form()がエラーを返したら、それをshow_form()へ渡す
    if ($form_errors = validate_form()) {
        show_form($form_errors);
    }
    else {
        // サブミットされた値が妥当であれば、それを処理
        process_form();
    }
}
else {
    // フォームがサブミットされなければ、表示する
    show_form();
}

function show_form($errors = '') {
    // フォームがサブミットされたら、サブミットされた
    // パラメータからデフォルトを取り出す
    if ($_POST['_submit_check']) {
        $defaults = $_POST;
    }
    else {
        // 出なければ、独自のデフォルトをセット
        $defaults = array(
                        'min_price' => '5.00',
                        'max_price' => '25.00');
    }

    // エラーが渡されると、$error_textに代入（HTMLマークアップととに）
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
    // 全てのHTMLタブをより簡単に表示するために、PHPモードを飛び出す
?>

<form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>">
    <table>
        <?php print $error_text ?>

        <tr>
            <td>Dish Name:</td>
            <td><?php input_text('dish_name', $defaults) ?></td>
        </tr>

        <tr>
            <td>Minimum Price:</td>
            <td><?php input_text('min_price', $defaults) ?></td>
        </tr>

        <tr>
            <td>Maximum Price:</td>
            <td><?php input_text('max_price', $defaults) ?></td>
        </tr>

        <tr>
            <td>Spicy:</td>
            <td><?php input_select('is_spicy', $defaults, $GLOBALS['spicy_choices']); ?></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><?php input_submit('search', 'Search') ?></td>
        </tr>
    </table>

    <input type="hidden" name="_submit_check" value="1" />
    </form>
<?php
}

function validate_form() {
    $errors = array();

    // 最低価格は妥当な浮動小数点数でなくてはならない
    if ($_POST['min_price'] != strval(floatval($_POST['min_price']))) {
        $errors[] = 'Please enter a valid minimum price.';
    }

    // 最高価格は妥当な浮動少数点数でなくてはならない
    if ($_POST['max_price'] != strval(floatval($_POST['max_price']))) {
        $errors[] = 'Please enter a valid maximum price.';
    }

    // 最低価格は最高価格より低くなくてはならない
    if ($_POST['min_price'] >= $_POST{'max_price'}) {
        $errors[] = 'The munimum price must be less than the maximum price';
    }

    if (! arrya_key_exists($_POST['is_spicy'], $GLOBALS['spicy_choices'])) {
        $errors[] = 'Please choose a valid "spicy" option.';
    }
    return $errors;
}

function process_form() {
    // このファンクション内で、グローバル変数の$dbにアクセスする
    global $db;

    // クエリを組み立てる
    $sql = 'SELECT dish_name, price is_spicy FROM dishes WHERE
            price >= ? AND price <= ?';

    // 料理名がサブミットされた場合は、WHERE句を加える
    // ユーザーが入れたワイルドカードを避けるために、quoteSmart()とstrtr()を使う
    if (strlen(trim($_POST['dish_name']))) {
        $dish = $db->quote($_POST['dish_name']);
        $dish = strtr($dish, array(
            '_' => '\_',
            '%' => '\%'));
        $sql .= " AND dish_name LIKE $dish";
    }

    // クエリをデータベースプログラムに送り、戻ってくるすべての行を取得
    $sth = $db->prepare($sql);
    $result = $sth->execute(array(
        $_POST['min_price'],
        $_POST['max_price']));
    $dishes = $result->fetchAll();

    if (count($dishes) == 0) {
        print 'No dishes matched';
    }
    else {
        print '<table>';
        print '<tr><th>Dish Name</th><th>Price</th><th>Spicy?</th></tr>';
        foreach ($dishes as $dish) {
            if ($dish->is_spicy == 1) {
                $spicy = 'Yes';
            }
            else {
                $spicy = 'No';
            }
            printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>', htmlentities($dish->name), $dish->price, $spicy);
        }
    }
}
?>
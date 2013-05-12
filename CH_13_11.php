<?php
/**
 * シェル・コマンドを実行する
 * Created by IntelliJ IDEA.
 * User: ryu
 * Date: 2013/05/04
 * Time: 16:08
 * To change this template use File | Settings | File Templates.
 */

// shell_exec()でプログラムを実行する

// "df"を走らせてその出力を明示的に行のなかに分割して出力
$df_output = shell_exec('/bin/df -h');
$df_lines = explode("¥n", $df_output);

var_dump($df_lines);

// 各行をループする。最初の行はヘッダーなので飛ばす
for ($i = 1, $lines = count($df_lines); $i < $lines; $i++) {
    if (trim($df_lines[$i])) {
        // 行をフィールドに分割
        $fields = preg_split('/¥s+/', $df_lines);
        // 各ファイルシステムについての情報を出力
        print "Filesystem $fields[5] is $fields[4] full.¥n";
    }
}

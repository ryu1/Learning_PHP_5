<?php
/**
 * PDF
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/30
 * Time: 14:20
 * To change this template use File | Settings | File Templates.
 */

// PDFドキュメントの作成

// これらの値の単位はポイント（1/72インチ）
$fontsize = 72; // 文字の高さ1インチ

$page_height = 612; // ページの高さ8.5インチ
$page_width = 792; // ページの幅11インチ

// 指定がない場合はデフォルトのメッセージを扱う
if (strlen(trim($_GET['message']))) {
    $message = trim($_GET['message']);
}
else {
    $message = 'Generate a PDF!';
}

// メモリ内部に新しいPDFドキュメントを生成

$pdf = pdf_new();
pdf_open_file($pdf, '');

// 11"x8.5"のページをドキュメントに追加
pdf_begin_page($pdf, $page_width, $page_height);

// 72ポイントのHelveticaフォントを選ぶ
$font = pdf_findfont($pdf, "Helvetica", "winansi", 0);
pdf_setfont($pdf, $font, $fontsize);

// ページの中央にメッセージを表示
pdf_show_boxed($pdf, $message, 0, ($page_height - $fontsize) / 2, $page_width, $fontsize, 'center');

// ページとドキュメントを終える
pdf_end_page($pdf);
pdf_close($pdf);

// メモリーからドキュメントの内容を取得し削除
$pdf_doc = pdf_get_buffer($pdf);
pdf_delete($pdf);

// 適切なヘッダとドキュメントの内容を送信
header('Content-Type: applecation/pdf');
header('Content-Type: ' . strlen($pdf_doc));
print $pdf_doc;
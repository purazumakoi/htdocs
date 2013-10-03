<?php
/**
 * Contact Form Example (in Japanese)
 *
 * @package
 * @version		0.01
 * @author		mataga
 * @license		MIT License
 * @copyright	2011 mataga
 * @link		http://twitter.com/mataga
 */

//お問い合わせフォーム Langファイル
// see: http://docs.fuelphp.com/classes/lang.html
// preview: http://twitpic.com/7nihhl
return array(
	'label' => array( // Form Labels
		'name1' => 'お名前・企業名',
		'zipcode' => '〒',
		'zipcodename' => '郵便番号',
		'address' => '住所',
		'tel' => '電話番号',
		'email' => 'メールアドレス',
		'body' => 'お問い合わせ内容',
		'req' => '（※）',
		'req_num' => '（半角数字）',
		'req_alnum' => '（半角英数）',
	),
	'info_msg' => array( // Notice-Messages
		'head' => 'お問合せの前に下記の内容をご確認ください。',
		'errhead' => '記入内容に不備があります。内容修正後、確認画面へ進むボタンを押してください。',
		'msg_arr' => array( // Notice-Messages array , STEP1 and STEP2 Messages
			'<font color="red">このデモではメールは送信していません。<del>代わりに最後に管理者宛メールのダンプを表示します。</del></font>',
			'<font color="red">DBにはデータを記録しています。email欄には適当にhoge@example.comでも入れといてください。</font>',
			'上記の通りメール送信していないのでこのフォームでの問い合わせ内容に返事することはありません。',
			'何か質問があるなら' . Html :: anchor( 'http://twitter.com/mataga', 'こちらまで', array( 'target' => '_blank' ) ).'。面倒なのは嫌ずら',
		),
		'submit_attention' => '上記の内容で送信します。<br>よろしければ送信ボタンを押してください。', //STEP2 Message
		'submit_ok' => 'お問い合わせを承りました', //STEP3 Messages
		'submit_ok_attention' => 'メールおよびお問い合わせフォームからのお問い合わせは、<br>お返事が翌営業日以降となる場合もございます。<br>あらかじめご了承ください。',
		'submit_ng' => 'エラー', //STEPNG Messages
		'submit_ng_attention' => '処理中にエラーが発生しました。（フォーム送信有効期限切れ）<br>一度送信済の場合はお手数ですが<br>' . Html::anchor('contact/entry', 'こちらのページから再度入力しなおしてください。'), //STEPNG Link
		'submit_404' => 'ページが見つかりません', //STEP404 Messages
		'submit_404_attention' => 'ページが見つかりません<br>' . Html::anchor('contact/entry', 'こちらのページからやり直してください。'), //STEP404 Link
	),
	'img_contact' => array( //Header IMG
		'alt' => 'お問い合わせフォーム',
		'filename' => 'jp_contact.gif',
	),
	'btn' => array( //Submit Button
		'reset' => 'リセット',
		'submitstep1' => '確認画面へ進む',
		'backtostep1' => '入力画面へ戻る',
		'submitstep2' => 'この内容で送信する',
	),
);
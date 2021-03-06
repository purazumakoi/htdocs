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

//お問い合わせフォーム STEP3：フォーム送信完了画面 Asset::  Html:: Form:: の練習
//（コメントはブログ記事用に冗長にしています。）

// （決め事）
// 今回はテンプレートエンジンは利用しない
// 慣れるために無駄にHTML::とか Asset:: とか Form::を使っています。別に普通にタグを書いても良いんだけど。
// see: http://docs.fuelphp.com/classes/html.html
// preview: http://twitpic.com/7jaauf

?>
<!-- Header IMG -->
<?php echo Asset::img(__('img_contact.filename'),array('alt'=>__('img_contact.alt'),'id'=>'img_contact')); ?>
<p style="clear:both;" />
<div class="c_send3" align="center">
	<p class="c_m1"><?php echo __('info_msg.submit_ok'); ?></p>
	<p><?php echo __('info_msg.submit_ok_attention'); ?></p>
	
	<p><a href="./entry">entryへ</a></p>
</div>
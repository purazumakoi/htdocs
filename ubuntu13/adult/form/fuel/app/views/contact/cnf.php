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

//お問い合わせフォーム STEP2：フォーム入力内容確認画面 Asset::  Html:: Form:: の練習
//（コメントはブログ記事用に冗長にしています。）

// （決め事）
// 今回はテンプレートエンジンは利用しない
// 慣れるために無駄にHTML::とか Asset:: とか Form::を使っています。別に普通にタグを書いても良いんだけど。
// see: http://docs.fuelphp.com/classes/html.html
// preview: http://twitpic.com/7jaa2x

?>
<!-- Header IMG -->
<?php echo Asset::img(__('img_contact.filename'),array('alt'=>__('img_contact.alt'),'id'=>'img_contact')); ?>
<p style="clear:both;" />

<!-- Notice-Messages -->
<div id="infoarea">
	<b><?php echo __('info_msg.head'); ?></b>
	<?php echo Html::ul(__('info_msg.msg_arr')); ?>
</div>
<div id="formarea">
	<?php echo Form::open('contact/cnf'); ?>


	<table class="c_tbl" cellspacing="1"  border="0" >
		<tbody>
		<tr>
			<td class="c_tdl">
				<!-- name -->
				<?php echo __('label.name1'); ?>
			</td>
			<td class="c_tdr">
				<?php echo e($val->input('name1')); ?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- address -->
				<?php echo __('label.address'); ?>
			</td>
			<td class="c_tdr">
				<?php echo __('label.zipcode'); ?><?php echo e($val->input('zipcode')); ?><br><?php echo e($val->input('address')); ?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- tel -->
				<?php echo __('label.tel'); ?>
			</td>
			<td class="c_tdr">
				<?php echo e($val->input('tel')); ?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- email -->
				<?php echo __('label.email'); ?>
			</td>
			<td class="c_tdr">
				<?php echo e($val->input('email')); ?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- body -->
				<?php echo __('label.body'); ?>
			</td>
			<td class="c_tdr">
				<?php echo e($val->input('body')); ?>
			</td>
		</tr>
		</tbody>
	</table>
	<div class="c_send1" align="center">
		<span class="attention"><?php echo __('info_msg.submit_attention'); ?></span>
	</div>

	<?php echo \Form::hidden(\Config::get('security.csrf_token_key'), \Security::fetch_token());?>

	<!-- Submit Button -->
	<div class="c_send2">

		<?php echo Form::submit('backtoentry', __('btn.backtostep1'), array('class'=>'c_btn')); ?>

		<?php echo Form::submit('submitstep2', __('btn.submitstep2'), array('class'=>'c_btn')); ?>
	</div>

	<?php echo Form::close(); ?>
</div>
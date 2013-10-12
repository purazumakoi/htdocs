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

//お問い合わせフォーム STEP1：フォーム入力画面 Asset::  Html:: Form:: の練習
//（コメントはブログ記事用に冗長にしています。）

// （決め事）
// 今回はテンプレートエンジンは利用しない
// 慣れるために無駄にHTML::とか Asset:: とか Form::を使っています。別に普通にタグを書いても良いんだけど。
// see: http://docs.fuelphp.com/classes/html.html
// preview: http://twitpic.com/7ja9pq

// Form::input()系を使う場合、
//内部でprep_value()（htmlspecialchars)が自動で呼ばれるので、e()でエンティティ化するとエスケープしてるつもりが二重エスケープみたいになってしまうので注意）
//（dont_prepのパラメータを引数で渡したり、config/form.phpで prep_valueをfalseに設定した場合はこの限りではない）

?>
<!-- Header IMG -->
<?php echo Asset::img(__('img_contact.filename'),array('alt'=>__('img_contact.alt'),'id'=>'img_contact')); ?>
<p style="clear:both;" />

<?php echo $name; ?>

<!-- Notice-Messages -->
<div id="infoarea">
	<b><?php echo __('info_msg.head'); ?></b>
	<?php echo Html::ul(__('info_msg.msg_arr')); ?>
</div>
<div id="formarea">
	<?php echo Form::open('contact/entry'); ?>
	<?php
	//CSRFのトークンをセット see http://docs.fuelphp.com/classes/security.html
	echo \Form::hidden(\Config::get('security.csrf_token_key'), \Security::fetch_token());
	?>
	<table class="c_tbl" cellspacing="1" border="0" >
		<tbody>
		<tr>
			<td class="c_tdl">
				<!-- name -->
				<?php echo __('label.name1'); ?>
				<span class="red"><?php echo __('label.req'); ?></span>
			</td>
			<td class="c_tdr">
				<?php echo Form::input('name1', $val->input('name1'), array('size' => '45','class'=>$val->css('name1'))); ?><?php echo $val->err('name1');?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- address -->
				<?php echo __('label.address'); ?>
				<span class="red"><?php echo __('label.req'); ?></span>
			</td>
			<td class="c_tdr">
				<?php echo __('label.zipcode'); ?>
				<?php echo Form::input('zipcode', $val->input('zipcode'), array('size' => '9','style'=>'max-width:80px;','class'=>$val->css('zipcode'))); ?> <?php echo Form::input('address', $val->input('address'), array('size' => '30','class'=>$val->css('address'))); ?><?php echo $val->err('zipcode');?><?php echo $val->err('address');?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- tel -->
				<?php echo __('label.tel'); ?>
				<span class="red"><?php echo __('label.req'); ?></span>
			</td>
			<td class="c_tdr">
				<?php echo Form::input('tel', $val->input('tel'), array('size' => '30','class'=>$val->css('tel'))); ?>
				<?php echo __('label.req_num'); ?><?php echo $val->err('tel');?>
			</td>
		</tr>
		<tr>
			<td class="c_tdl">
				<!-- email -->
				<?php echo __('label.email'); ?>
				<span class="red"><?php echo __('label.req'); ?></span>
			</td>
			<td class="c_tdr">
				<?php echo Form::input('email', $val->input('email'), array('size' => '30','class'=>$val->css('email'))); ?>
				<?php echo __('label.req_alnum'); ?><?php echo $val->err('email');?>
			</td>
		</tr>
		<tr>
			<!-- body -->
			<td class="c_tdl">
				<?php echo __('label.body'); ?>
				<span class="red"><?php echo __('label.req'); ?></span>
			</td>
			<td class="c_tdr">
				<?php echo Form::textarea('body', $val->input('body'), array('rows' => 8, 'cols' => 45,'class'=>$val->css('body'))); ?><?php echo $val->err('body');?>
			</td>
		</tr>
		</tbody>
	</table>
	<!-- Submit Button -->
	<p align="center">
		<?php echo Form::reset('reset', __('btn.reset'), array('class'=>'c_btn')); ?>
		<?php echo Form::submit('submitstep1', __('btn.submitstep1'), array('class'=>'c_btn')); ?>
	</p>
	<?php echo Form::close(); ?>



	<?php
	//Debugクラスの拡張実験 GeSHi
	//echo '<div class=\'debugarea\'><h2>debug</h2>';
	//echo Debug::vdbg($val->validated());
	//echo Debug::vhighlight('modules/contact/classes/controller/contact.php','app');
	//Debugクラスの拡張実験 dBug
	//echo Debug::openheart('ｼﾞﾌﾞﾝｦ','ﾄｷﾊﾅﾂ!');
	/*
	// Debugクラスを使ってみる http://docs.fuelphp.com/classes/debug.html
	echo Debug::inspect(__('img_contact'));
	echo Debug::phpini();
	echo Debug::headers();
	echo Debug::extensions();
	echo Debug::constants();
	echo Debug::functions();
	echo Debug::includes();
	echo Debug::interfaces();
	echo Debug::classes();
	echo Debug::backtrace();
	echo Debug::dump($this, 'junk', array('whatever'));
	*/
	//echo '</div>';
	?>

</div>
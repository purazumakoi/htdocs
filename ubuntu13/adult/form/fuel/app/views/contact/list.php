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
	<?php
		foreach($data as $key => $val){
			foreach($val as $val_key => $val_val){
				echo $val_key.":";
				echo $val_val["id"]."<br>";
				echo $val_val["title"]."<br>";
				echo \Format::forge($val_val["body"])->to_array()."<br>";

			}
		}

	?>
</div>
<div id="formarea">


</div>
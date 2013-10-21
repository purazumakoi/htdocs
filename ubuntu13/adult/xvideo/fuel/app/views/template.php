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

// 共通テンプレート（テンプレートの外枠部分）
//（コメントはブログ記事用に冗長にしています。）

// （決め事）
// 今回はテンプレートエンジンは利用しない
// 慣れるために無駄にHTML::とか Asset:: とか Form::を使っています。別に普通にタグを書いても良いんだけど。
// see: http://docs.fuelphp.com/classes/html.html
// see: core/classes/html.php

?>
<?php echo Html::doctype('xhtml1-trans'); ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<?php
	// Html::meta()はarrayでも渡せる。第三引数で http-equiv を設定
	$meta = array(
		array('name' => 'Content-Type', 'content' => 'text/html; charset=UTF-8', 'http-equiv'),
		array('name' => 'Content-Style-Type', 'content' => 'text/css', 'http-equiv'),
		array('name' => 'Content-Script-Type', 'content' => 'text/javascript', 'http-equiv'),
	);
	echo Html::meta($meta);
	?>

	<?php echo Html::meta('robots', 'no-cache');?>

	<?php
	//see: http://docs.fuelphp.com/classes/asset.html
	//preview: http://twitpic.com/7jp9r9
	?>
	<?php echo Asset::css('style.css'); ?>
	<?php echo Asset::js('common.js'); ?>
	<title><?php if(isset($title)){ echo $title; }else{ echo ''; } ?></title>
</head>
<body>
<div <?php if(isset($content_cssid)){ echo "id='$content_cssid' "; }else{ echo "id='container' "; } ?>>
	<div id="contents">
		<?php if(isset($content)){ echo $content; }else{ echo ''; } ?>
	</div>
</div>
</body>
</html>
 
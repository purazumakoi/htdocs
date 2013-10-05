<?php
/**
 * Contact Form Example (in Japanese)
 * お問い合わせフォームを作ってFuelPHPを使いこなす練習中 -モデルファイル
 * （コメントはブログ記事用に冗長にしています。）
 *
 * @package
 * @version 0.01
 * @author mataga
 * @license MIT License
 * @copyright 2011 mataga
 * @link http://twitter.com/mataga
 */

namespace Model;
//namespace Model;//see http://docs.fuelphp.com/general/models.html

class Contact extends \Orm\Model {//see http://docs.fuelphp.com/packages/orm/intro.html
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array('before_insert'),
		'Orm\Observer_UpdatedAt' => array('before_save'),
	);

	//see http://docs.fuelphp.com/packages/orm/creating_models.html#/propperties
	//型・長さ・バリデーション・フォームに表示するしないなど細かく設定できるが列名列挙だけでもまあ動く
	//（バリデーション済データを渡すのでとりあえずいいか…後で検証）
	protected static $_properties = array(
		'id',
		'title',
		'body',
		'created_at',
		'updated_at',
	);
	/**
	 *
	 * バリデーションルールのセット
	 *
	 * @access public
	 * @return object
	 */
	//see http://docs.fuelphp.com/classes/validation.php/validation.php.html
	public static function validate($fieldset)
	{

		$val = \Validation::forge($fieldset);
		$val->add('name1', __('label.name1'))
			->add_rule('required')
			->add_rule('max_length', 60)
			->add_rule('valid_string', array('utf8'));
		$val->add('zipcode', __('label.zipcodename'))
			->add_rule('max_length', 8)
			->add_rule('valid_string', array('utf8','numeric','dashes'));
		$val->add('address', __('label.address'))
			->add_rule('required')
			->add_rule('max_length', 256)
			->add_rule('valid_string', array('utf8'));
		$val->add('tel', __('label.tel'))
			->add_rule('required')
			->add_rule('max_length', 32)
			->add_rule('valid_string', array('utf8','numeric','dashes'));
		$val->add('email', __('label.email'))
			->add_rule('required')
			->add_rule('max_length', 256)
			->add_rule('valid_email');
		$val->add('body', __('label.body'))
			->add_rule('required')
			->add_rule('max_length', 8192);
		//->add_rule('valid_string', array('all',''));
		return $val;
	}
}
 
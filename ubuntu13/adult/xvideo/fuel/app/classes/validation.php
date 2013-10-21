<?php
/**
 * Core Class Extends Example
 * @package
 * @version 0.01
 * @author mataga
 * @license MIT License
 * @copyright 2011 mataga
 * @link http://twitter.com/mataga
 */

class Validation extends Fuel\Core\Validation
{

	/**
	 * バリデーションOKの時とNGの時にCSSのクラス名を自動的に返す（CSSのクラス名は 'fldok' または 'flderr' config/validation.phpで設定可能）
	 * @param  string $key
	 * @return  string
	 */
	public function css($key = null)
	{
		if(is_string($key)&&$key)
		{
			\Config::load('validation', true);
			$ret = \Config::get('validation.css_name.ok', 'fldeok');
			if(parent::error($key))
			{
				$ret = \Config::get('validation.css_name.err', 'flderr');
			}
			return $ret;
		}else{
			return '';
		}
	}
	/**
	 * get_messageのラッパー INPUT領域の側にエラーを表示する用途を想定
	 *
	 * @param   string
	 * @return  string
	 */
	public function err($key)
	{
		$ret = '';
		if(is_string($key)&&$key)
		{
			if(parent::error($key))
			{
				\Config::load('validation', true);
				$s_head = \Config::get('validation.err_tag.head', "<p class='errtxt'>");
				$s_foot = \Config::get('validation.err_tag.foot', '</p>');
				$ret = $s_head.parent::error($key)->get_message().$s_foot ;
			}
		}
		return $ret;
	}
}

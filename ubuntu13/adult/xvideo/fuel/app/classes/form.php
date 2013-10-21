<?php
/**
 * Core Class Extends Example (form.php)
 * @package
 * @version 0.01
 * @author mataga
 * @license MIT License
 * @copyright 2011 mataga
 * @link http://twitter.com/mataga
 */
class Form extends Fuel\Core\Form
{
	/**
	 * Prep Value
	 *
	 * Prepares the value for display in the form
	 *
	 * @param   string
	 * @return  string
	 */
	public static function prep_value($value)
	{
		//htmlspecialchars にENT_QUOTESとencodingを追加
		$value = htmlspecialchars($value,ENT_QUOTES,Config::get('encoding'));
		return $value;
	}
}//endofclass
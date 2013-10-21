<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.6
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The welcome 404 view model.
 *
 * @package  app
 * @extends  ViewModel
 */
class View_Welcome_404 extends ViewModel
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$messages = array('404.phpだよ Aw, crap!', '404.phpだよ Bloody Hell!', '404.phpだよ Uh Oh!', '404.phpだよ Nope, not here.', '404.phpだよ Huh?');
		$this->title = $messages[array_rand($messages)];
	}
}

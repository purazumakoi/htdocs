<?php
/**
 * Created by PhpStorm.
 * User: purazumakoi
 * Date: 2013/10/04
 * Time: 3:00
 */

class View_Contact_List extends ViewModel
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$this->name = $this->request()->param('name', 'Worldですよ');

		//$this->data = $this->data;

		//var_dump($data["contact_ary"]);
	}
}

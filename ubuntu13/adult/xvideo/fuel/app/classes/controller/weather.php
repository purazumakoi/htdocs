<?php
class Controller_Weather extends Controller_Rest
{
	public function get_today()
	{
		//クエリ文字列から地名を代入
		$location = Input::get('loc');

		$weather = 'fine';

		//レスポンスを返す
		$this->response(array(
			'location' => $location,
			'weather' => $weather,
		));
	}
	public function action_category($cat = 'php',$page = '1',$page1 = '1')
	{
		return __FILE__ . '<br />' . $cat . '<br />' . $page. '<br />' . $page1;
	}
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('welcome/hello'));
	}
}
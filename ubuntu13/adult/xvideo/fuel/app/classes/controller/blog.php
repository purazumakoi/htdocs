<?php
class Controller_Blog extends Controller {

	public function action_category($cat = 'php',$page = '1',$page1 = '1')
	{
		return __FILE__ . '<br />' . $cat . '<br />' . $page. '<br />' . $page1;
	}
	public function action_index()
	{

		$mongodb = \Mongo_Db::instance();
		// 挿入
		//$results = $mongodb->insert('posts', array('name' => '名前', 'contents' => 'コンテンツ'));
		// データ取得
		$results = $mongodb->get('posts');
//		var_dump($results);
		print_r($results);

		return $results;

	}
}
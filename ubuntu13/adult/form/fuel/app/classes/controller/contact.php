<?php
/**
 * Created by PhpStorm.
 * User: purazumakoi
 * Date: 2013/10/04
 * Time: 2:47
 */


// （このコントローラのモデルをContact::で呼び出す為に指定、
// とりあえずFuelのマニュアルの流儀に沿ってやってみる）
//use \Model\Contact;
use \Model\Contact;

class Controller_Contact extends \Controller_Template {

	/*public function action_category($cat = 'php',$page = '1',$page1 = '1')
	{
		return __FILE__ . '<br />' . $cat . '<br />' . $page. '<br />' . $page1;
	}*/


	public function before()
	{


		parent::before();
		// app/config/contact.php を contactとして読み込みConfig::get('contact.配列キー') で値取得が可能になる
		// see: http://docs.fuelphp.com/general/controllers/base.html

		// 今回はミニミニシステムなのでapp/config/config.php内のautoloadで常にロードするように設定してもいいんだが、コントローラー内に閉じ込めておく。
		\Config::load('contact', true);
		// 日本語部分はhttp://docs.fuelphp.com/classes/lang.html を使ってマルチランゲージ対応してみた。
		\Lang::load('contact'); //Langファイルのロード

		# var_dump(Uri::string());exit;//UriクラスでUri周りの情報は取れる http://docs.fuelphp.com/classes/uri.html

//		if ($this->_count_params())
//		{// URLに不必要なパラメータ付けて来たらわざとリダイレクトする
//			\Response::redirect('contact/entry');
//		}

	}

	/**
	* STEP0:indexはentryにリダイレクト
	*
	* @access public
	* @return void
	*/
	public function action_index()
	{

		// http://example.com/contact 呼び出し時はhttp://example.com/contact/entry へリダイレクト
		// 今回はThickBoxのモーダル呼び出しで使うので直接呼び出されることはあまりない。
		// preview: http://twitpic.com/7nfkv3
		\Response::redirect('contact/entry');

	}

	/**
	 * entry：フォーム入力画面
	 *
	 * @access public
	 * @return void
	 */
	public function action_entry()
	{
		$v_data=null;
		// バリデーションルールのセット（ここではモデル内(app/classes/model/contact.php）にルールを記述している）
		$val = Contact::validate('contact');


		if (\Input::post())
		{

			/*if(0)
			{//尚ここでトークンチェックをすると STEP2からブラウザのBackボタンで戻って再入力した時も弾かれる。
				//action_step2のみでトークンチェックするに留め、ここでのチェックは緩めにするのも一考
				$this->_check_token(); // CSRFトークンチェック、不正POSTを弾く。
			}*/

			if (\Input::post('submitstep1'))
			{// フォームデータにPOSTがあった場合の処理（「確認画面へ進む」ボタン押下時）
				// バリデーション実行

				if ($val->run())
				{// バリデーション実行OKならセッションにバリデーション済みのPOSTデータ格納して確認画面STEP2にリダイレクト
					\Session::set_flash('now_step', 'cnf'); //即消しセッションに現在のステップをセット
					\Session::set_flash('v_data', \Validation::instance('contact'));//pointA:後述
					//\Session::keep_flash('now_step');
					//\Session::keep_flash('v_data');

					\Session::set('hoge','hoge');



					\Response::redirect('contact/cnf');
				}

			}
		}else{
			// フォームデータにPOST無しの場合
			if ('backtostep1' === \Session::get_flash('now_step'))
			{
				//STEP2「入力画面に戻る」ボタン押下経由でリダイレクトされて来た時の処理
				//pointCで保持し続けたデータをここで展開
				$v_data = \Session::get_flash('v_data');
			}
		}
		$this->template->title = 'Contact &raquo; entry';//titleのセット(template.phpで展開される）

		//外枠ビューtemplate.phpの$contentに内側ビューcontact/entry.phpと内側ビューで展開する変数$valをセット
		//バリデーション済データをview側で$valで呼べるようにセットする
		//ここでは自動Htmlエンコードは行わない(第三引数false）see http://docs.fuelphp.com/classes/view.html
		$this->template->content = \View::forge('contact/entry')
			-> set('val', is_null($v_data)? \Validation::instance('contact'):$v_data, false);
	}

	/**
	 * STEP2：フォーム送信内容確認画面
	 *
	 * @access public
	 * @return void
	 */
	public function action_cnf()
	{
		print_r(\Session::get_flash());
		print_r(\Session::get_flash('now_step'));
		print_r(\Session::get_flash('v_data'));exit;

		if (\Input::post())
		{

			$this->_check_token();

			if (\Input::post('backtoentry'))
			{// 「入力画面に戻る」ボタン押下時
				\Session::set_flash('now_step', 'backtoentry'); //即消しセッションに現在のステップをセット
				\Session::keep_flash('v_data');//pointC:リダイレクトしても(pointB)で再度セットしたvalid_contact_dataをそのまま保持しておく。
				\Response::redirect('contact/entry');
			}
			elseif(\Input::post('submitstep2'))
			{	// 「この内容で送信する」ボタン押下時
				$v_data = \Session::get_flash('v_data');
				if(is_null($v_data)){//nullならentryに戻す。（check_step通過済なので必ず(pointA)からデータが渡ってきてるはずだが一応）
					\Response::redirect('contact/entry');
				}
				$contact = new Contact(array(
					'title' => \Config::get('contact.formname.ptn1'),//フォームの種類を格納（ソースを拡張して複数フォーム対応する予定のためとりあえず
					'body' => \Format::forge($v_data->validated())->to_serialized(),//POSTされてきたバリデーション済データはほぼ再利用しないのでserialize化して保存しとく適当仕様
				));
				// 問い合わせデータを保存する、管理画面は作らないけど保存だけ
				if ($contact->save())
				{
					\Session::set_flash('now_step', 'act');
					\Response::redirect('contact/act');
				}
				else
				{
					\Session::set_flash('now_step', 'entryng');
					\Response::redirect('contact/entryng');
				}
			}else{
				\Response::redirect('contact/entry');//想定外のPOSTはentryに差し戻す
			}
		}else{

			//$this->_check_step('cnf'); //URL直呼び防止。entryの画面からSTEP2の画面にリダイレクトされてきた場合「以外」はentryに戻す。
			//POST無しでentryからリダイレクトされてきた時セッションにセットしたv_dataを画面表示用に取り出す
			$v_data = \Session::get_flash('v_data');
		print_r($v_data);exit;
			if(is_null($v_data))
			{
				\Response::redirect('contact/entry');
			}
			\Session::set_flash('v_data',$v_data);//pointB:次の画面に渡す用に再度set_flashしておく
			$this->template->title = 'Contact &raquo; Step2';
			$this->template->content = \View::forge('cnf')->set('val', $v_data, false);
		}
	}

	/**
	 * STEP3：フォーム送信完了画面
	 *
	 * @access public
	 * @return void
	 */
	public function action_act()
	{
		$this->_check_step('act');
		\Session::destroy();
		/**
		 * 　○　　>>セッション乙 おまいにはもう用は無い。明示的にセッションのゴミは消しとく
		 * 　く|）へ
		 * 　　〉　　　ヽ○ノ
		 * ￣￣7　　ヘ/
		 * 　　／　 　ノ
		 * 　　|
		 * 　／
		 * 　|
		 * ／
		 */
		$this->template->title = 'Contact &raquo; Step3';
		$this->template->content = \View::forge('act');
	}

	/**
	 * entryng：NGリダイレクト画面
	 *
	 * @access public
	 * @return void
	 */
	public function action_entryng()
	{
		$this->_check_step('entryng'); //URL直呼び防止
		\Session::destroy(); //NG画面でも明示的にセッションのゴミは消しとく
		$this->template->title = 'Contact &raquo; entryng';
		$this->template->content = \View::forge('entryng');
	}

	/**
	 * entryng：そんなページネーヨ画面
	 *
	 * @access public
	 * @return void
	 */
	public function action_step404()
	{

		$this->template->title = 'Contact &raquo; entryng';
		$this->template->content = \View::forge('step404');

	}
	/**
	 * SRCWINDOW：ソース全体像
	 *
	 * @access public
	 * @return void
	 */
	public function action_srcwindow()
	{

		$this->template->title = 'Contact &raquo;';
		$this->template->content_cssid = 'container_l';
		$this->template->content = \View::forge('srcwindow');
	}

	/**
	 * SRCDBG：Debugクラスの拡張実験
	 *
	 * @access public
	 * @return void
	 */
	public function action_srcdbg()
	{

		$this->template->title = 'Contact &raquo;';
		$this->template->content_cssid = 'container_l';

		$hoge = array(
			array(
				"name" => "Jack",
				"age" => 21,
				"hobby"=>array("anime","game","golf"),

			),
			array(
				"name" => "Jill",
				"age" => 23,
				"hobby"=>array("pc","manga","tennis"),
			)
		);

		$this->template->content = \View::forge('srcdbg')->set('hoge',$hoge,false);
	}

	/**
	 * CSRFトークンチェック不正POSTを弾く see http://docs.fuelphp.com/classes/security.html
	 *
	 * @access private
	 * @return void
	 */
	private function _check_token()
	{
		if (! \Security::check_token())
		{
			// CSRF attack or expired CSRF token
			\Session::set_flash('now_step', 'entryng'); //即消しセッションに現在のステップをセット
			\Response::redirect('contact/entryng'); //トークンNGの場合はNGページに行ってしまえ
		}
	}

	/**
	 * ステップすっ飛ばし防止対策 この辺の共通処理はコントローラのベースを作ってそっちに突っ込んで継承する方がいいか。
	 *
	 * @access private
	 * @return void
	 */
	private function _check_step($step_name)
	{
		if ($step_name !== \Session::get_flash('now_step'))
		{
			// $step_nameがセットされていない場合はentryに強制リダイレクト
			// セッションのget_flashについては see http://docs.fuelphp.com/classes/session/usage.html
			\Response::redirect('contact/entry');
		}
	}
	/**
	 * URLに不必要なパラメータ付けて来たらわざとリダイレクトする。 OK:/contact/entry NG:/contact/entry/aa/bb/cc、但し/contact/entry?hoge=fugaはOK
	 * 後で調べる、URIで渡ってきたパラメータの数を取得する最も正しい方法ってFuelでは何を使えば良いのか？
	 *
	 * @access private
	 * @return number
	 */
	private function _count_params()
	{
		//$count = count($this->request->method_params);
		$count = count(Input::get());
		return $count;
	}

}
<?php

class RequestsController extends AppController {
    //Requestというモデルを使用(入力チェック用)
    public $uses = 'Request';
    //Emailというコンポーネントを使用(メール送信用)
    public $components = array('Email');
    function index(){
        //モデルから以下の配列を取得し、ビューに出力
        $this->set('sex',$this->Request->sex);
        $this->set('area',$this->Request->area);
        //「確認する」が押されたとき
        if(isset($this->params['data']['enter'])){
            //モデルに情報をセット
            $this->Request->set($this->data);
            //入力チェック
            if($this->Request->validates()){
                //セッションに情報を保存
                $this->Session->write('data',$this->data);
                //ビューを変更
                $this->render('result');
            }
        //「送信する」が押されたとき
        }elseif(isset($this->params['data']['send'])){
            //セッションの情報を取得
            $data = $this->Session->read('data');
            $this->set('data',$data);
            //メール送信
            $this->sendmail($data);
            //セッションの情報を削除
            $this->Session->delete('data');
            $this->render('finish');
        //「戻る」が押されたとき
        }elseif(isset($this->params['data']['back'])){
            $this->data = $this->Session->read('data');
            $this->render();
        }
    }
    //メール送信関数
    function sendmail($data){
        $this->Email->sendAs = 'text';
        $this->Email->to = $data['email'];
        $this->Email->bcc = array('test@webase.info');
        $this->Email->subject = 'メールを送信しました';
        $this->Email->from = 'test@webase.info';
        $this->Email->template = 'post';
        $this->Email->send();
    }
  

}




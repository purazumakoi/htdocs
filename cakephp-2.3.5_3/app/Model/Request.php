<?php

class Request extends AppModel{
    //テータベースのテーブルを使わない
    public $useTable = false;
    public $sex = array(
        'male' => '男性',
        'fmale' => '女性'
    );
    public $area = array(
        'area1' => '北海道',
        'area2' => '東北',
        'area3' => '関東',
        'area4' => '甲信越',
        'area5' => '北陸',
        'area6' => '東海',
        'area7' => '近畿',
        'area8' => '中国',
        'area9' => '四国',
        'area10' => '九州',
        'area11' => '沖縄'
    );
    //入力チェック
    public $validate = array(
        'name' => array(
            'maxLength' => array(
                'rule' => array('maxLength','50'),
                'allowEmpty' => false,
                'message' => '名前は50文字以内で入力してください'
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '名前を入力してください'
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email',true),
                'message' => 'メールアドレスを正しく入力してください'
            ),
            'notEmtpy' => array(
                'rule' => array('notEmpty'),
                'message' => 'メールアドレスを入力してください'
            )
        ),
        'sex' => array(
            'rule' => array('notEmpty'),
            'message' => '性別を選択してください'
        ),
        'area' => array(
            'rule' => array('multiple', array('min' => 1)),
            'required' => true,
            'message' => '出身を入力してください'
        ),
        'text' => array(
            'maxLength' => array(
                'rule' => array('maxLength','500'),
                'allowEmpty' => false,
                'message' => '内容は500文字以内で入力してください'
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '内容を入力してください'
            )
        )
    );
}
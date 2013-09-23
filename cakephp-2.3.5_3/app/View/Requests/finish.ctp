<?php $this->assign('title','CakePHPメールフォーム確認画面'); ?>
<?php $this->Html->css('post',null,array('inline' => false)); ?>
<?php echo $this->Form->create(false,array('type' => 'post','action' => '')); ?>
<table id="post_table">
    <tr>
        <th>名前</th>
        <td>
            <?php echo $this->data['name']; ?>
        </td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>
            <?php echo $this->data['email']; ?>
        </td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            <?php echo $sex[$this->data['sex']]; ?>
        </td>
    </tr>
    <tr>
        <th>出身</th>
        <td>
            <?php
            foreach($this->data['area'] as $k => $v){
                $area_tmp[$k] = $area[$v];
            }
             ?>
            <?php echo implode(',',$area_tmp); ?>
        </td>
    </tr>
    <tr>
        <th>内容</th>
        <td>
            <?php echo nl2br($this->data['text']); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?php echo $this->Form->submit('送信する',array('name' => 'send')); ?>
            <?php echo $this->Form->submit('戻る',array('name' => 'back')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>
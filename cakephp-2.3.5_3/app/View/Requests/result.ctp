<?php $this->assign('title','CakePHPメールフォーム完了画面'); ?>
<?php $this->Html->css('post',null,array('inline' => false)); ?>
<?php echo $this->Form->create(false,array('type' => 'post','action' => '')); ?>
<table id="post_table">
    <tr>
        <td>
            送信完了しました。
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?php echo $this->Form->submit('戻る',array('name' => 'back')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>
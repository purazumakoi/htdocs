<?php $this->assign('title','CakePHPメールフォーム'); ?>
<?php $this->Html->css('post',null,array('inline' => false)); ?>
<?php echo $this->Form->create(false,array('type' => 'post','action' => '')); ?>
<table id="post_table">
    <tr>
        <th>名前</th>
        <td>
            <?php echo $this->Form->input('name',array('type' => 'text','label' => false)); ?>
            <?php echo $this->Form->error('Request.name'); ?>
        </td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>
            <?php echo $this->Form->input('email',array('type' => 'text','label' => false)); ?>
            <?php echo $this->Form->error('Request.email'); ?>
        </td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            <?php echo $this->Form->input('sex',array('type' => 'radio','options' => $sex,'legend' => false)); ?>
            <?php echo $this->Form->error('Request.sex'); ?>
        </td>
    </tr>
    <tr>
        <th>出身</th>
        <td>
            <?php echo $this->Form->input('area',array('type' => 'select','multiple' => 'checkbox','options' => $area,'label' => false)); ?>
            <?php echo $this->Form->error('Request.area'); ?>
        </td>
    </tr>
    <tr>
        <th>内容</th>
        <td>
            <?php echo $this->Form->textarea('text',array('rows' => '10','cols' => '40')); ?>
            <?php echo $this->Form->error('Request.text'); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <?php echo $this->Form->submit('確認する',array('name' => 'enter')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>
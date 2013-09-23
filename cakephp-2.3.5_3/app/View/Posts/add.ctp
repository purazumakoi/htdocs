<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post追加するよ</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('同意して送信する');
?>
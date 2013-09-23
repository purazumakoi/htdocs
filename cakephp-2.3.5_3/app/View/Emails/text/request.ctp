以下の内容を送信しました。
 
名前：<?php echo $data['name'] ?>
 
メールアドレス：<?php echo $data['email'] ?>
 
性別：<?php echo $sex[$data['sex']]; ?>
 
出身：<?php foreach($data['area'] as $k => $v){$area_tmp[$k] = $area[$v];} echo implode(',',$area_tmp); ?>
 
内容：
<?php echo $data['text'] ?>
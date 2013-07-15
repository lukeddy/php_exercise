<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $title ?></title>
</head>
<body>
<h2><?php echo $title ?></h2>
<?php if(isset($result)){?>
  <p style="color:red;font-size: 16px;border:1px solid green;padding:10px;"><?php echo $result;?></p>
<?php }?>
<div>
<?php echo form_open(site_url("email/sendEmail")) ?>
 发件人：<input type="text" name="from"/><br/>
 密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"/><br/>
 收件人：<input type="text" name="to"/><br/>
主&nbsp;&nbsp;&nbsp;&nbsp;题：<input type="text" name="subject"/><br/>
正&nbsp;&nbsp;&nbsp;&nbsp;文：<textarea rows="10" cols="100" name="content"></textarea><br/>
<input type="submit" value="发送"/>
<?php echo form_close() ?>
</div>
</body>
</html>
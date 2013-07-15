<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
</head>
<body>
<h2><?php echo $title ?></h2>
<?php echo isset($error) ? $error : "" ?>
<?php echo form_open_multipart(site_url("upload/uploadFile")) ?>
文件：<input type="file" name="userfile" size="20"/></br>
<input type="submit" value="上传"/>
<?php echo form_close() ?>

<br/>
<br/>
<?php if (isset($upload_data)) { ?>
    <h3>Your file was successfully uploaded!</h3>
    <img src="<?php echo $img_url;?>" alt="<?php echo $upload_data["file_type"]; ?>" title="<?php echo $upload_data["full_path"]?>"/>
    <ul>
        <?php foreach ($upload_data as $item => $value): ?>
            <li><?php echo $item; ?>: <?php echo $value; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
<?php } ?>
</body>
</html>
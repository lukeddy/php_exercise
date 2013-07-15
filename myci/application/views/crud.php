<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>

    <style type="text/css">

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::moz-selection {
            background-color: #E13300;
            color: white;
        }

        ::webkit-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }

        #container div {
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 20px;
            padding-left: 20px;
            border: 2px solid green;

        }
    </style>
</head>
<body>
<div id="container">
    <h1><?php echo $header ?></h1>
    <hr/>
    <div>
        <h2>查询1：</h2>
        <?php foreach ($result as $row) { ?>
            <p>ID:<?php echo $row->id ?>&nbsp;&nbsp;Username:<?php echo $row->username ?>
                &nbsp;&nbsp;Password:<?php echo $row->password ?></p>
        <?php } ?>
        <h2>查询2：</h2>
        <?php foreach ($result2 as $row) { ?>
            <p>ID:<?php echo $row["id"] ?>&nbsp;&nbsp;Username:<?php echo $row["username"] ?>
                &nbsp;&nbsp;Password:<?php echo $row["password"] ?></p>
        <?php } ?>
    </div>
    <div>
        <h2>添加</h2>
        <span style="color:blue;font-weight: bold;">
            <?php if (isset($insert_msg)) { ?>
                <?php echo $insert_msg; ?>
            <?php } ?>
        </span>

        <p>
            <?php echo form_open('crud/insert'); ?>
            用户名: <?php echo form_input('username', '', 'style="width:100px"'); ?><br/>
            密&nbsp;&nbsp;&nbsp;码:<?php echo form_password('password', '', 'style="width:100px"'); ?><br/>
            <?php echo form_submit('submit', '插入'); ?>
            <?php echo form_close(); ?>
        </P>
    </div>
    <div>
        <h2>修改</h2>
        <span style="color:green;font-weight: bolder;">
            <?php if (isset($update_msg)) { ?>
                <?php echo $update_msg; ?>
            <?php } ?>
        </span>
        <?php foreach ($result2 as $row) { ?>
            <p>
                <?php echo form_open('crud/update/' . $row["id"]); ?>
                用户名: <?php echo form_input('username', $row["username"], 'style="width:100px"'); ?>
                密&nbsp;&nbsp;&nbsp;码:<?php echo form_password('password', $row["password"], 'style="width:100px"'); ?>
                <?php echo form_submit('submit', '修改'); ?>
                <?php echo form_close(); ?>
            </p>
        <?php } ?>
    </div>
    <div>
        <h2>删除</h2>
        <span style="color:tomato;font-weight: bolder;">
            <?php if(isset($delete_msg)){?>
              <?php echo $delete_msg ?>
            <?php } ?>
        </span>
        <?php foreach ($result2 as $row) { ?>
            <p>ID:<?php echo $row["id"] ?>&nbsp;&nbsp;Username:<?php echo $row["username"] ?>&nbsp;&nbsp;Password:<?php echo $row["password"] ?>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url( "crud/del/".$row['id']);?>">删除</a>
            </p>
        <?php } ?>
    </div>
</div>
</body>
</html>
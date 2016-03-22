<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>show</title>
</head>
<body>
    <h3><?php echo ($list); ?></h3>
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><h3><?php echo ($vo["name"]); ?></h3>
        <h4><?php echo ($vo["note"]); ?></h4><?php endforeach; endif; ?>
</body>
</html>
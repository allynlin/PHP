<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        .margin-left {
            margin-left: 10px;
        }

        .margin-right {
            margin-right: 10px;
        }
    </style>
    <title>chapter09.php</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <?php
            // 定义3个变量
            $a = 1;
            $b = 2;
            $c = 3;
            // 定义1个关联数组
            $arr = array(
                'a' => $a,
                'b' => $b,
                'c' => $c
            );
            // 使用compact()将变量转化为关联数组
            $arr2 = compact('a', 'b', 'c');
            // 使用extract()将数组中的元素导出到以键名作为变量名的变量中
            echo extract($arr2);
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <?php

            ?>
        </div>
    </div>
</div>
</body>
</html>

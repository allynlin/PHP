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
    <title>数组.php</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <h1>直接赋值生成关联数组</h1>
            <?php
            // 使用[]直接给数组中的元素进行赋值,生成关联数组
            $arr = ['name' => '张三', 'age' => 20,'sex'=>'男'];
            print_r($arr);
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <h1>直接赋值生成索引数组</h1>
            <?php
            // 使用[]直接给数组中的元素进行赋值,生成索引数组
            $arr = ['张三', 20,'男'];
            print_r($arr);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <h1>隐型数组生成关联数组</h1>
            <?php
            //使用隐型数组直接给数组中的元素进行赋值,生成关联数组
            $arr[]='张三';
            $arr[]=20;
            $arr[]='男';
            print_r($arr);
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <h1>隐型数组生成索引数组</h1>
            <?php
            //使用隐型数组直接给数组中的元素进行赋值,生成索引数组
            $arr[1]='张三';
            $arr[2]=20;
            $arr[3]='男';
            print_r($arr);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <h1>array()函数生成关联数组</h1>
            <?php
            //使用array()函数,生成关联数组
            $arr=array('name'=>'张三','age'=>20,'sex'=>'男');
            print_r($arr);
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <h1>array()函数,生成索引数组</h1>
            <?php
            //使用array()函数,生成索引数组
            $arr=array('张三','20','男');
            print_r($arr);
            ?>
        </div>
    </div>
</div>
</body>
</html>

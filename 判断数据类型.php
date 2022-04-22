<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>判断数据类型</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px;">
            <form method="post">
                <label>
                    <span>请输入内容：</span>
                    <input type="text" name="content">
                </label>
                <label style="text-align: center">
                    <input type="submit" value="计算" class="btn btn-success btn-block">
                </label>
            </form>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <?php
            //error_reporting(0);
            //屏蔽错误
            if ($_POST) {
                //不要使用isset判断，$_POST数据已经存在，会返回为真
                if ($_POST["content"]) {
                    $content = $_POST["content"];
                    $type=gettype($content);
                    if (isset($content)&&is_numeric($content)&&!strpos($content, '.')) {
                        echo "<br><div class='white-pink'><p class='text-center'>是整数</p></div>";
                    }else{
                        echo "<br><div class='white-pink'><p class='text-center'>不是整数</p></div>";
                    }
                    echo "<br><div class='white-pink'><p class='text-center'>$type</p></div>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

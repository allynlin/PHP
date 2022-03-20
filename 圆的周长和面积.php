<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>圆的周长和面积</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" class="white-pink" style="margin-top: 10px">
                <label>
                    <span>圆的半径：</span>
                    <input type="text" name="bj">
                </label>
                <label style="text-align: center">
                    <input type="submit" value="计算" class="button">
                </label>
            </form>
        </div>
        <div class="col-md-6">
            <?php
            //error_reporting(0);
            //屏蔽错误
            $discount_finally = "";
            if ($_POST){
                //不要使用isset判断，$_POST数据已经存在，会返回为真
                if ($_POST["bj"]){
                    $bj = $_POST["bj"];
                    $zc=2*3.14*$bj;
                    $mj=3.14*$bj*$bj;
                    print "<div class='white-pink'><p class='text-center'>圆的周长为：$zc<br>圆的面积为：$mj</p></div>";
                }else{
                    print "<div class='white-pink'><p class='text-center' style='color: #ff3838;font-weight: bold;'>请输入半径</p></div>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

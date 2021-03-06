<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>商品促销</title>
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
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <form method="post">
                <label>
                    <span>价格：</span>
                    <input type="text" name="price">
                </label>
                <label>
                    <span>折扣：</span>
                    <select name="discount">
                        <option>九折</option>
                        <option>八折</option>
                        <option>七折</option>
                        <option>六折</option>
                        <option>五折</option>
                    </select>
                </label>
                <label style="text-align: center">
                    <input type="submit" value="计算" class="btn btn-success btn-block">
                </label>
            </form>
        </div>
        <?php
        //error_reporting(0);
        //屏蔽错误
        $discount_finally = "";
        if ($_POST) {
            echo "<div class='col-md-6 white-pink margin-left'";
            //不要使用isset判断，$_POST数据已经存在，会返回为真
            switch ($_POST["discount"]) {
                case "九折":
                    $discount_finally = 0.9;
                    break;
                case "八折":
                    $discount_finally = 0.8;
                    break;
                case "七折":
                    $discount_finally = 0.7;
                    break;
                case "六折":
                    $discount_finally = 0.6;
                    break;
                case "五折":
                    $discount_finally = 0.5;
                    break;
            }
            if ($_POST["price"]) {
                $price_finally = $_POST["price"];
                $price_discount = $discount_finally * $price_finally;
                echo "<p class='text-center'>商品折扣后价格是：$price_discount 元</p>";
            } else {
                echo "<p class='text-center' style='color: #ff3838;font-weight: bold;'>请输入商品价格</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>

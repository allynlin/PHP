<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>隐私保护</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px">
            <form method="post">
                <h1>保护手机号码</h1>
                <label>
                    <span>手机号码：</span>
                    <input type="tel" name="tel">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                //屏蔽错误信息
                error_reporting(0);
                if ($_POST['tel']) {
                    $tel = $_POST['tel'];
                    if (preg_match('/^1[34578]\d{9}$/', $tel)) {
                        $tel = substr($tel, 0, 3) . '****' . substr($tel, 7);
                        echo '<p>您的手机号码是：' . $tel . '</p>';
                    } else {
                        echo '<p>请输入正确的手机号码</p>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <form method="post">
                <h1>保护身份证号码</h1>
                <label>
                    <span>身份证号码：</span>
                    <input type="text" name="sfz">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                if ($_POST['sfz']) {
                    $sfz = $_POST['sfz'];
                    if (preg_match('/^\d{17}[\dx]$/', $sfz)) {
                        $sfz_low = substr($sfz, 0, 3) . '***********' . substr($sfz, 14);
                        $sfz_height = substr($sfz, 0, 1) . '****************' . substr($sfz, 17);
                        echo '<p>低隐私保护身份证号码：' . $sfz_low . '</p>';
                        echo '<p>高隐私保护身份证号码：' . $sfz_height . '</p>';
                    } else {
                        echo '<p>请输入正确的身份证号码</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

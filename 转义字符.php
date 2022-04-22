<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>转义字符</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px;">
            <?php
            echo "\"Why doesn't \"this\" work?\"";
            echo "<br>";
            echo "C:\\network\tables\\";
            echo "<br>";
            echo "变量{\$a}的值为\"abc\"";
            echo "<br>";
            echo "\\101BCD";
            ?>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px;">
            <?php
            echo '"Why doesn\'t "whis" work?" ';
            echo '<br>';
            echo 'C:\network\tables\\';
            echo '<br>';
            echo '变量{$a}的值为"abc"';
            echo '<br>';
            echo '\101BCD';
            ?>
        </div>
    </div>
</div>
</body>
</html>

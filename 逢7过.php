<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>逢7过</title>
    <style>
        .dangerous {
            color: red;
        }

        .safe {
            color: green;
        }
    </style>
</head>
<body>
<?php
for ($i = 1; $i <= 100; $i++) {
//    //如果i除7余数为0或者i能被7整除，则i是危险数，放入数组dangerous中
//    if ($i % 7 == 0 || $i / 7 == 0) {
//        $dangerous[] = $i;
//    }else{
//        $safe[] = $i;
//    }
    //输出数组dangerous中的元素
    if ($i % 10 == 7 || $i % 7 == 0) {
        echo "<p class='dangerous'>$i</p>";
    } else {
        echo "<p class='safe'>$i</p>";
    }
}
?>
</body>
</html>

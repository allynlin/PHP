<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>打印实心菱形</title>
    <style>
        body {
            font-size: 16px;
        }
    </style>
</head>
<body>
<?php
//利用循环语句，实现在网页中打印用星号“*”组成的实心菱形
$row = 5; //控制循环的行数
$str = "*"; //输出显示字符
$space = "&nbsp;"; //输出空格字符
//循环菱形的上半部分中的空格
for ($i = 1; $i <= $row; $i++) {
    for ($b = 1; $b <= $row - $i; $b++) { //控制输出的空格数
        echo $space;
    }//$c代表输出字符数目
    for ($c = 1; $c <= ($i - 1) * 2 + 1; $c++) { //控制输出的字符数目
        echo $str;
    }
    //输出换行符
    echo "<br>";
}
//循环菱形下半部分中的空格
for ($i = $row - 1; $i >= 1; $i--) {
    for ($b = 1; $b <= $row - $i; $b++) {//控制输出的空格数
        echo $space;
    }//$c代表输出字符数目
    for ($c = 1; $c <= ($i - 1) * 2 + 1; $c++) {
        echo $str;
    }
    //输出换行符
    echo "<br>";
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>test.php</title>
</head>
<body>
<?php
//屏蔽错误信息
error_reporting(0);
//function test($a,$b)
//{
//    //输出两个数字的最小值
//    return min($a,$b);
//}
//echo test(5,6);
//function isPass($num)
//{
//    if ($num >= 60) {
//        return pass;
//    } else {
//        echo "输入不符合规则";
//    }
//}
//
//echo isPass(70);

//$input1="hello,world";
//$input2=",helloworld";
//$input3="helloworld";
//echo "<br>";
//var_dump(explode(",",$input1));
//echo "<br>";
//var_dump(explode(",",$input2));
//echo "<br>";
//var_dump(explode(",",$input3));

//$str4="abcdef";
////截取字符串$str4 截取从字符"c"开始，截取到字符"e"结束
//echo substr($str4,2,3);

//$str5="abc123abc";
////str5中"a"的首次出现的位置
//echo strpos($str5,"a");
////str5中"a"的最后一次出现的位置
//echo strrpos($str5,"a");


$file = __FILE__;
echo $file;
echo "<br>";
//使用explode方法获取文件拓展名
$arr = explode('.', $file);
echo end($arr);  //end()返回数组的最后一个元素
echo "<br>";
//通过strpos方法获取文件拓展名
echo substr($file, strrpos($file, '.') + 1);
echo "<br>";
//通过trim方法获取文件拓展名
echo trim(substr(strrchr($file, '.'), 1));
echo "<br>";

//假设有一只猴子摘了一堆桃子，当即吃了一半，可是桃子太好吃了，它又多吃了一个，第二天它把第一天剩下的桃子吃了一半，又多吃了一个，就这样到第十天早上它只剩下一个桃子了，问它一共摘了多少个桃子？用递归算法实现。
function peach($n)
{
    if ($n == 1) {
        return 1;
    } else {
        return (peach($n - 1) + 1) * 2;
    }
}
echo peach(10);


?>
</body>
</html>

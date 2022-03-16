<?php
//$txt1 = "学习 PHP";
//$txt2 = "RUNOOB.COM";
//$cars = array("Volvo", "BMW", "Toyota");
//
//echo $txt1;
//echo "<br>";
//echo "在 $txt2 学习 PHP ";
//echo "<br>";
//echo "我车的品牌是 $cars[0]<hr>";

function test($name, $class, $age)
{
    echo "我的姓名是：$name<br>";
    echo "我的班级是：$class<br>";
    echo "我的年龄是：$age";
}

test("龙涛", "应用2031", 19);

function test1($a){
    print "<br>hello 以下是我的自我介绍:";
    print $a;
}
test1("我是龙涛");

//phpinfo();
//$name = "runoob";
//$a = <<<EOF
//        "abc"$name
//        "123"
//EOF;
//// 结束需要独立一行且前后不能空格
//echo $a;
//
//
//echo <<<EOF
//        <h1>我的第一个标题</h1>
//        <p>我的第一个段落。</p>
//EOF;
// 结束需要独立一行且前后不能空格


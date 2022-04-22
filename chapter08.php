<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>2022-04-22练习作品</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px">
            <form method="post">
                <label>
                    <span>索引文字：</span>
                    <input type="text" name="text">
                </label>
                <label>
                    <span>索引样式：</span>
                    <div>
                        <input type="checkbox" name="sty[]" value="font-weight:bold">加粗
                        <input type="checkbox" name="sty[]" value="color:red">标红
                        <input type="checkbox" name="sty[]" value="font-style:italic">斜体
                    </div>
                </label>
                <label class="text-center">
                    <input class="btn btn-success btn-block" type="submit" value="提交">
                </label>
            </form>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <?php
            $zw = 'PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言。语法吸收了C语言、Java和Perl的特点，利于学习，使用广泛，主要适用于Web开发领域。PHP 独特的语法混合了C、Java、Perl以及PHP自创的语法。它可以比CGI或者Perl更快速地执行动态网页。用PHP做出的动态页面与其他的编程语言相比，PHP是将程序嵌入到HTML（标准通用标记语言下的一个应用）文档中去执行，执行效率比完全生成HTML标记的CGI要高许多；PHP还可以执行编译后代码，编译可以达到加密和优化代码运行，使代码运行更快。';
            //查看是否提交
            if ($_POST) {
                //查看是否提交了要改变样式的文本
                if ($_POST["text"]) {
                    //查看是否提交了样式
                    if ($_POST["sty"]) {
                        $sty = $_POST["sty"];
                        //定义一个变量存储样式
                        $s = "style='";
                        //把更改的样式输出
                        $len = count($sty);
                        for ($i = 0; $i < $len; $i++) {
                            global $s;
                            $s .= "$sty[$i]" . ";";
                        }
                        $s .= "'";
                        $text = $_POST["text"];
                        $keyword = "<span $s>$text</span>";
                        //将text中的"语言"替换为keyword;
                        echo str_replace($text, $keyword, $zw);
                    } else {
                        $text = $_POST["text"];
                        $keyword = "<font style='color: red;font-weight: bold'>$text</font>";
                        //将text中的"语言"替换为keyword;
                        echo str_replace($text, $keyword, $zw);
                    }
                } else {
                    echo $zw;
                }
            } else {
                echo $zw;
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px">
            <h1>输出两个数字的最小值</h1>
            <?php
            function test($a, $b)
            {
                //输出两个数字的最小值
                return min($a, $b);
            }

            echo test(5, 6);
            ?>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <h1>判断是否超过60分</h1>
            <?php
            //屏蔽错误信息
            error_reporting(0);
            function isPass($num)
            {
                if ($num >= 60) {
                    return pass;
                } else {
                    echo "输入不符合规则";
                }
            }

            echo isPass(70);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px">
            <h1>字符串函数</h1>
            <?php
            $input1 = "hello,world";
            $input2 = ",helloworld";
            $input3 = "helloworld";
            echo "<br>";
            var_dump(explode(",", $input1));
            echo "<br>";
            var_dump(explode(",", $input2));
            echo "<br>";
            var_dump(explode(",", $input3));
            ?>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <h1>字符串函数</h1>
            <?php
            $str4 = "abcdef";
            //截取字符串$str4 截取从字符"c"开始，截取到字符"e"结束
            echo substr($str4, 2, 3);
            echo "<br>";
            $str5 = "abc123abc";
            //str5中"a"的首次出现的位置
            echo strpos($str5, "a");
            echo "<br>";
            //str5中"a"的最后一次出现的位置
            echo strrpos($str5, "a");
            echo "<br>";
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink" style="margin-right: 10px">
            <h1>获取文件拓展名</h1>
            <?php
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
            echo trim(strstr($file, '.'), '.');
            echo "<br>";
            ?>
        </div>
        <div class="col-md-6 white-pink" style="margin-left: 10px">
            <h1>猴子摘桃</h1>
            <?php
            //假设有一只猴子摘了一堆桃子，当即吃了一半，可是桃子太好吃了，它又多吃了一个，第二天它把第一天剩下的桃子吃了一半，又多吃了一个，就这样到第十天早上它只剩下一个桃子了，问它一共摘了多少个桃子？用递归算法实现。
            function peach($n)
            {
                if ($n == 1) {
                    return 1;
                } else {
                    $num = (peach($n - 1) + 1) * 2;
                    echo "第" . $n . "天，摘了" . $num . "个桃子<br>";
                    return $num;
                }
            }

            echo peach(10);
            ?>
        </div>
    </div>
</div>
</body>
</html>

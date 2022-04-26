<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
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
    <title>2022-04-22练习作品</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <form method="post">
                <label>
                    <span>索引文字：</span>
                    <input type="text" name="text">
                </label>
                <label>
                    <span>文字大小：</span>
                    <input type="number" name="fontsize">
                </label>
                <label>
                    <span>索引样式：</span>
                    <div>
                        <input type="checkbox" name="sty[]" value="font-weight:bold">加粗
                        <input type="checkbox" name="sty[]" value="font-style:italic">斜体
                        <input type="checkbox" name="sty[]" value="text-decoration:underline">下划线
                        <input type="checkbox" name="sty[]" value="text-decoration:line-through">删除线
                    </div>
                </label>
                <label>
                    <span>字体颜色：</span>
                    <input type="color" name="textcolor">
                </label>
                <label>
                    <span>背景颜色：</span>
                    <input type="color" name="bgcolor" value="#ffffff">
                </label>
                <label>
                    <input class="btn btn-success btn-block" type="submit" value="提交（默认为红色加粗）">
                </label>
            </form>
        </div>
        <div class="col-md-6 white-pink margin-left">
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
                        $s.="color:$_POST[textcolor];background-color:$_POST[bgcolor];font-size:$_POST[fontsize]px;'";
                        $text = $_POST["text"];//获取文本
                        $keyword = "<span $s>$text</span>";//定义一个变量存储更改后的文本
                        //将text中的"语言"替换为keyword;
                        echo str_replace($text, $keyword, $zw);//输出更改后的文本
                    } else {
                        $text = $_POST["text"];
                        $keyword = "<span style='color: red;font-weight: bold'>$text</span>";
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
        <div class="col-md-6 white-pink margin-right">
            <form method="post">
                <h1>输出两个数字的最小值</h1>
                <label>
                    <span>第一个数字：</span>
                    <input type="number" name="num1">
                </label>
                <br>
                <label>
                    <span>第二个数字：</span>
                    <input type="number" name="num2">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                //屏蔽错误信息
                error_reporting(0);
                function test($a, $b)
                {
                    //输出两个数字的最小值
                    return min($a, $b);
                }

                if ($_POST) {
                    if ($_POST["num1"] && $_POST["num2"]) {
                        $num1 = $_POST["num1"];
                        $num2 = $_POST["num2"];
                        echo "最小值为：" . test($num1, $num2);
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <form method="post">
                <h1>获取文件拓展名</h1>
                <label>
                    <span>文件路径：</span>
                    <input type="text" name="path">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                $file = __FILE__;
                echo "当前文件路径：".$file;
                echo "<br>";
                //使用explode方法获取文件拓展名
                if ($_POST["path"]) {
                    $path = $_POST["path"];
                    $arr = explode(".", $path);
                    echo "输入的文件路径中拓展名为：".end($arr);  //end()返回数组的最后一个元素
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <form method="post">
                <h1>字符串函数</h1>
                <label>
                    <span>字符串：</span>
                    <input type="text" name="str">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                if ($_POST["str"]) {
                    $str = $_POST["str"];
                    var_dump(explode(",", $str));
                }
                ?>
            </div>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <form method="post">
                <h1>判断是否超过60分</h1>
                <label>
                    <span>成绩：</span>
                    <input type="number" name="score">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                //屏蔽错误信息
                //error_reporting(0);
                function isPass($num)
                {
                    if ($num >= 60) {
                        return pass;
                    } else {
                        echo "输入不符合规则";
                    }
                }

                if ($_POST["score"]) {
                    $score = $_POST["score"];
                    echo isPass($score);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 white-pink margin-left">
            <form method="post">
                <h1>字符串函数</h1>
                <label>
                    <span>字符串：</span>
                    <input type="text" name="strfunction">
                </label>
                <label>
                    <span>截取开始字符：</span>
                    <input type="number" name="strstart">
                </label>
                <label>
                    <span>截取字符长度：</span>
                    <input type="number" name="strlen">
                </label>
                <label>
                    <span>需要截取的字符：</span>
                    <input type="text" name="character">
                </label>
                <label>
                    <input type="submit" class="btn btn-success btn-block">
                </label>
            </form>
            <div class="text-center">
                <?php
                if ($_POST["strfunction"] && $_POST["strstart"] && $_POST["strlen"]) {
                    $strfunction = $_POST["strfunction"];
                    $strstart = $_POST["strstart"];
                    $strlen = $_POST["strlen"];
                    echo "需要截取的字符串为：".substr("abcdefg", 1, 3);
                }
                if ($_POST["strfunction"] && $_POST["character"]) {
                    $strfunction = $_POST["strfunction"];
                    $character = $_POST["character"];
                    echo "字符".$character."首次出现的位置：".strpos($strfunction, $character)."<br>";
                    echo "字符".$character."最后出现的位置：".strrpos($strfunction, $character);
                }
                ?>
            </div>
        </div>
        <div class="col-md-6 white-pink margin-left">
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

            peach(10);
            ?>
        </div>
    </div>
</div>
</body>
</html>

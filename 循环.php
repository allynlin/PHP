<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>循环</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        td {
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="white-pink text-center">
                <p>案例2-1：计算红白黑球个数</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="white-pink">
                <?php
                //有红、白、黑三种球若干个，其中红、白球共25个，白、黑球共31个，红、黑球共28个，使用for循环完成计算这三种球的个数
                for ($red = 1; $red < 25; $red++) {//红白球共25，红黑共28，红球数量小于25
                    for ($white = 1; $white < 25; $white++) {//红白球共25，白黑球共31，白球数量小于25
                        for ($black = 1; $black < 28; $black++) {//白黑球共31，红黑球共28，黑球数量小于28
                            if ($red + $white == 25 and $white + $black == 31 and $red + $black == 28) {
                                echo "红球个数：$red<br>";
                                echo "白球个数：$white<br>";
                                echo "黑球个数：$black<br>";
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="white-pink text-center">
                <p>案例2-2：九九乘法表</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="white-pink text-center">
                <?php
                echo "<table><caption>";
                for ($i = 1; $i <= 9; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= $i; $j++) {
                        echo "<td>" . $i . 'x' . $j . '=' . $i * $j . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</caption></table>";
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="white-pink text-center">
                <p>案例2-3：判断成绩</p>
                <form method="post" class="white-pink">
                    <label>
                        <span>语文：</span>
                        <input type="text" placeholder="请输入语文成绩" name="chinese">
                    </label>
                    <label>
                        <span>数学：</span>
                        <input type="text" placeholder="请输入数学成绩" name="math">
                    </label>
                    <label>
                        <input class="btn btn-block btn-success" type="submit" value="提交">
                    </label>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="white-pink text-center">
                <?php
                error_reporting(0);
                if ($_POST) {
                    if ($_POST["chinese"] && $_POST["math"]) {
                        if ($_POST["chinese"] >= 0 && $_POST["chinese"] <= 100 && $_POST["math"] && $_POST["math"] >= 0 && $_POST["math"] <= 100) {
                            $ch = $_POST["chinese"];
                            $ma = $_POST["math"];
                            $cj = ($ch + $ma) / 2;
//                            用if写
//                            if ($cj < 60) {
//                                echo "平均成绩是$cj<br>课后打扫卫生";
//                            } else if ($cj < 70) {
//                                echo "平均成绩是$cj<br>完成课后作业";
//                            } else if ($cj < 80) {
//                                echo "平均成绩是$cj<br>正常上课";
//                            } else if ($cj < 90) {
//                                echo "平均成绩是$cj<br>放假半天";
//                            } else if ($cj < 100) {
//                                echo "平均成绩是$cj<br>放假一天";
//                            }
//                            用switch写
                            switch ($cj / 10) {
                                case 10:
                                case 9:
                                    echo "平均成绩是$cj<br>放假一天";
                                    break;
                                case 8:
                                    echo "平均成绩是$cj<br>放假半天";
                                    break;
                                case 7:
                                    echo "平均成绩是$cj<br>正常上课";
                                    break;
                                case 6:
                                    echo "平均成绩是$cj<br>完成课后作业";
                                    break;
                                default:
                                    echo "平均成绩是$cj<br>课后打扫卫生";
                                    break;
                            }
                        } else {
                            echo "成绩不符合要求，请重新输入";
                        }
                    } else {
                        echo "请输入完整的语文和数学成绩";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

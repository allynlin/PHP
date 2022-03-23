<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>圆的周长和面积</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        table {
            width: 100%;
        }

        table, tr, td {
            outline: 1px solid black;
            text-align: center;
        }

        tr, td {
            width: 50%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" class="white-pink" style="margin-top: 10px">
                <label>
                    <span>圆的半径：</span>
                    <input type="text" name="bj">
                </label>
                <label style="text-align: center">
                    <input type="submit" value="计算" class="button">
                </label>
            </form>
        </div>
        <div class="col-md-6">
            <div class="white-pink">
                <?php
                if ($_POST["bj"]) {
                    define("pi", 3.14);
                    $bj = $_POST["bj"];
                    $zc = 2 * pi * $bj;
                    $mj = pi * $bj * $bj;
                    echo "<table>";
                    echo "<tr><td colspan='2'>计算圆的周长和面积</td></tr>";
                    echo "<tr><td>半径：</td><td>$bj</td></tr>";
                    echo "<tr><td>周长：</td><td>$zc</td></tr>";
                    echo "<tr><td>面积：</td><td>$mj</td></tr>";
                    echo "</table>";
                    echo "<hr>";
                    echo "<table>";
                    echo "<tr><td colspan='2'>数据类型</td></tr>";
                    echo "<tr><td>半径：</td><td>";
                    echo var_dump($bj);
                    echo "</td></tr>";
                    echo "<tr><td>周长：</td><td>";
                    echo var_dump($zc);
                    echo "</td></tr>";
                    echo "<tr><td>面积：</td><td>";
                    echo var_dump($mj);
                    echo "</td></tr>";
                    echo "</table>";
                    echo "<hr>";
                    echo "<table>";
                    echo "<tr><td colspan='2'>检测数据类型</td></tr>";
                    echo "<tr><td>半径是否为整形：</td><td>";
                    echo var_dump((bool)is_int($bj));
                    echo "</td></tr>";
                    echo "<tr><td>周长是否由数字组成：</td><td>";
                    echo var_dump((bool)is_numeric($zc));
                    echo "</td></tr>";
                    echo "<tr><td>面积是否为字符串型：</td><td>";
                    echo var_dump((bool)is_string($mj));
                    echo "</td></tr>";
                    echo "</table>";
                    echo "<hr>";
                    echo "<table>";
                    echo "<tr><td colspan='2'>转换数据类型</td></tr>";
                    echo "<tr><td>将半径转换为整形：</td><td>";
                    echo (int)$bj;
                    echo "</td></tr>";
                    echo "<tr><td>将周长转换为字符串型：</td><td>";
                    echo (string)$zc;
                    echo "</td></tr>";
                    echo "<tr><td>将面积转换为整形：</td><td>";
                    echo (int)$mj;
                    echo "</td></tr>";
                    echo "</table>";
                    echo "<hr>";
                    echo "<table>";
                    echo "<tr><td colspan='2'>运算符的应用</td></tr>";
                    echo "<tr><td>面积比周长大：</td><td>";
                    echo var_dump($mj > $zc);
                    echo "</td></tr>";
                    echo "<tr><td>只要面积大于200以及周长小于100就是个完美的圆，请问您做的圆完美吗：</td><td>";
                    echo var_dump($mj > 200 && $zc < 100);
                    echo "</td></tr>";
                    echo "<tr><td>只要面积大于100或者周长小于50就及格，请问您做的及格吗：</td><td>";
                    echo $mj > 100 || $zc < 50 ? "及格" : "不及格";
                    echo "</td></tr>";
                    echo "<tr><td>如果不完美，将面积自增，每加1：</td><td>";
                    if ($mj > 200 && $zc < 100) {
                        echo $mj;
                    } else {
                        echo ++$mj;
                    }
                    echo "</td></tr>";
                    echo "<tr><td>如果不完美，将周长自减，每加1：</td><td>";
                    if ($mj > 200 && $zc < 100) {
                        echo $mj;
                    } else {
                        echo --$zc;
                    }
                    echo "</td></tr>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

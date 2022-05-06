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
    <title>2022-05-06.php</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <h1>模拟栈操作</h1>
            <?php
            // 定义一个空数组$arr
            $arr = [];
            // 使用array_unshift()函数依次把"a,b,c,d"添加到数组$arr中，并输出数组
            array_unshift($arr, "a");
            print_r($arr);
            echo "<hr>";
            array_unshift($arr, "b");
            print_r($arr);
            echo "<hr>";
            array_unshift($arr, "c");
            print_r($arr);
            echo "<hr>";
            array_unshift($arr, "d");
            print_r($arr);
            echo "<hr>";
            array_unshift($arr, "e");
            print_r($arr);
            echo "<hr>";
            // 使用array_pop()函数依次把数组$arr中的元素依次取出，并输出
            array_pop($arr);
            print_r($arr);
            echo "<hr>";
            array_pop($arr);
            print_r($arr);
            echo "<hr>";
            array_pop($arr);
            print_r($arr);
            echo "<hr>";
            array_pop($arr);
            print_r($arr);
            echo "<hr>";
            ?>
        </div>
        <div class="col-md-6 margin-left">
            <div class="col-md-12 white-pink-100">
                <h1>歌唱比赛评分</h1>
                <?php
                // 使用数组保存评委的评分,评委评分如下：85,92,73,96,100,89,67,81,95,88
                $score = [85, 92, 73, 96, 100, 89, 67, 81, 95, 88];
                // 使用sort()函数对数组$score进行升序排序
                sort($score);
                // 使用array_shift()函数和array_pop()函数取出最高分和最低分
                $max = array_shift($score);
                $min = array_pop($score);
                // 使用array_sum()函数计算数组$score的总和
                $sum = array_sum($score);
                // 使用array_sum()函数计算数组$score的平均分
                $avg = array_sum($score) / count($score);
                // 输出以上所有数据
                echo "最高分：$max<br>";
                echo "最低分：$min<br>";
                echo "总分：$sum<br>";
                echo "平均分：$avg<br>";
                ?>
            </div>
            <div class="col-md-12 white-pink-100">
                <h1>explode()函数</h1>
                <?php
                // 编写一个函数change($str),将字符串"open_door"转换成"OpenDoor","make_by_id"转换成"MakeById"
                function change($str)
                {
                    // 使用explode()函数将字符串"open_door"转换成数组["open","door"]
                    $arr = explode("_", $str);
                    // 使用array_map()函数对数组$arr中的每个元素进行处理，将每个元素的首字母大写
                    $arr = array_map("ucfirst", $arr);
                    // 使用implode()函数将数组$arr中的每个元素连接成字符串"OpenDoor"
                    $str = implode("", $arr);
                    // 使用str_replace()函数将字符串"make_by_id"转换成"MakeById"
                    $str = str_replace("_", "", $str);
                    return $str;
                }

                $str = "open_door,make_by_id";
                echo "转换前的字符串为:$str<br>";
                echo "转换后的字符串为:" . change($str);
                ?>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
</body>
</html>

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
    <title>2022-05-04课堂练习</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 white-pink-100">
            <?php
            // 用array关键字方法定义一个关联数组，分别存放以下内容
            // 周一，java课；周二，php课；周三，数据结构
            $arr = array(
                "周一" => "java课",
                "周二" => "php课",
                "周三" => "数据结构"
            );
            // 用对应的函数检查数组中的某个键名和某个键值（检查任意键名和键值）是否存在
            if (array_key_exists("周一", $arr)) {
                echo "数组中存在键名为“周一”的键值";
            } else {
                echo "数组中不存在键名为“周一”的键值";
            }
            echo "<br/>";
            // 取得数组中键名为“周二”的键值
            echo "数组中键名为“周二”的键值为：" . $arr["周二"];
            echo "<br/>";
            // 分别将该数组对应的值赋给“周一”、“周二”、“周三”这三个变量
            list($arr["周一"], $arr["周二"], $arr["周三"]) = array("php课", "数据结构", "java课");
            // 用对应的函数获取该数组中所有的键名和值
            foreach ($arr as $key => $value) {
                echo "数组中键名为".$key."的键值为：$value";
                echo "<br/>";
            }
            echo "<br/>";
            // 已知一个数组Array ( [0] => 2 [1] => 2 [2] => 5 [3] => 5 [4] => 6 ),用对应的函数移除该数组中重复的值，生成的新数组Array1，并将数组Array1的值下标，利用对应的函数进行填充形成新数组，需要新数组的值均为php课程
            $arr = array(2, 2, 5, 5, 6);
            $arr1 = array_unique($arr);
            $arr2 = array_fill_keys($arr1, "php课");
            print_r($arr2);
            ?>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        body {
            text-align: center;
        }

        .box {
            margin: 0 auto;
            width: 880px;
        }

        .title {
            background: #ccc;
        }

        table {
            height: 200px;
            width: 200px;
            font-size: 12px;
            text-align: center;
            float: left;
            margin: 10px;
            font-family: arial;
        }
    </style>
    <title>制作年历</title>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $week = date("w");
        $week_array = array("日", "一", "二", "三", "四", "五", "六");
        $month_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
        // 用循环输出12个表格
        /**
         * @param string $year
         * @param $month_array
         * @return void
         */
        echo "<div class='box'>";
        function print_table(string $year, $month_array): void
        {
            echo "<table>";
            // 输出表头
            echo "<tr>";
            echo "<th class='text-center title' colspan='7'>" . $year . "年" . $month_array . "月</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>日</th>";
            echo "<th>一</th>";
            echo "<th>二</th>";
            echo "<th>三</th>";
            echo "<th>四</th>";
            echo "<th>五</th>";
            echo "<th>六</th>";
            echo "</tr>";
        }

        for ($i = 0; $i < 12; $i++) {
            // 输出表格
            print_table($year, $month_array[$i]);
            // 输出表格内容
            // 计算当月的天数
            $days = date("t", mktime(0, 0, 0, $i + 1, 1, $year));
            // 计算当月第一天是星期几
            $first_day = date("w", mktime(0, 0, 0, $i + 1, 1, $year));
            // 计算当月最后一天是星期几
            $last_day = date("w", mktime(0, 0, 0, $i + 1, $days, $year));
            // 输出空格
            for ($j = 0; $j < $first_day; $j++) {
                echo "<td></td>";
            }
            // 输出天数
            for ($j = 1; $j <= $days; $j++) {
                echo "<td>" . $j . "</td>";
                // 判断是否是最后一天
                if (($j + $first_day) % 7 == 0) {
                    echo "</tr>";
                }
            }
            // 输出空格
            for ($j = 0; $j < (7 - $last_day - 1); $j++) {
                echo "<td></td>";
            }
            echo "</table>";
        }
        echo "</div>";
        ?>
    </div>
</div>

</body>
</html>

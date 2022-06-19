<?php
$pdo = new PDO("mysql:host=localhost;dbname=php", "root", "123456");
$sql = "select * from student";
$data = $pdo->query($sql)->fetchAll();
$num = 5;
$count = count($data);
$w = ceil($count / $num);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $num;
$sql = "select * from student limit $offset,{$num}";
$data = $pdo->query($sql)->fetchAll();
$p = ($page == 1) ? 0 : ($page - 1);
$n = ($page == $w) ? 0 : ($page + 1);
?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Document</title>

</head>

<body>

<form action="">

    <table border="1">

        <tr>

            <th>姓名</th>

            <th>年龄</th>

            <th>班级</th>

        </tr>

        <?php
        foreach ($data as $v) {
            echo "<tr>";
            echo "<td>" . $v['username'] . "</td>";
            echo "<td>" . $v['age'] . "</td>";
            echo "<td>" . $v['userclass'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <?php

    if ($page == 1) {
        echo "首页";
    } else {
        echo "<a href='?page=1'>首页</a>";
    }
    if ($p) {
        echo "<a href='?page={$p}'>上一页</a>";
    } else {
        echo "上一页";
    }
    if ($n) {
        echo "<a href='?page={$n}'>下一页</a>";
    } else {
        echo "下一页";
    }
    if ($page == $w) {
        echo "尾页";
    } else {
        echo "<a href='?page={$w}'>尾页</a>";
    }
    ?>
</form>

</body>

</html>
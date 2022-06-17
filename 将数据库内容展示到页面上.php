<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.6.0.js"></script>
    <meta content="light dark" name="color-scheme">
    <style>
        .margin-left {
            margin-left: 10px;
        }

        .margin-right {
            margin-right: 10px;
        }

        th {
            text-align: center;
        }
    </style>
    <title>将数据库内容展示到页面上</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 white-pink margin-right">
            <?php
            // 引入数据库连接文件
            $con = mysqli_connect("localhost", "root", "123456", "PHP");
            // 检测连接
            if (mysqli_connect_errno()) {
                echo "连接失败: " . mysqli_connect_error();
            }
            // 设置编码，防止中文乱码
            mysqli_query($con, "set names utf8");
            // 查询数据库
            $sql = "SELECT * FROM `classpath`";
            $result = mysqli_query($con, $sql);
            echo "<table class='table table-striped table-bordered table-hover text-center'>";
            echo "<tr>";
            echo "<th>编号</th>";
            echo "<th>姓名</th>";
            echo "<th>班级</th>";
            echo "<th>电话</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['class'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($con);
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <form method="post">
                <label>
                    <span>姓名：</span>
                    <input type="text" name="username">
                </label>
                <label>
                    <span>班级：</span>
                    <input type="text" name="class">
                </label>
                <label>
                    <span>电话：</span>
                    <input type="text" name="phone">
                </label>
                <label>
                    <input class="btn btn-success btn-block" type="submit" value="添加">
                </label>
            </form>
            <?php
            // 引入数据库连接文件
            $con = mysqli_connect("localhost", "root", "123456", "PHP");
            // 检测连接
            if (mysqli_connect_errno()) {
                echo "连接失败: " . mysqli_connect_error();
            }
            // 接收表单数据
            if ($_POST) {
                $username = $_POST['username'];
                $class = $_POST['class'];
                $phone = $_POST['phone'];
                // 插入数据库
                $sql = "INSERT INTO `classpath` (`username`, `class`, `phone`) VALUES ('$username', '$class', '$phone')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "<script>alert('添加成功！');</script>";
                } else {
                    echo "<script>alert('添加失败！');</script>";
                }
                // 清空表单数据,防止表单重复提交
                unset($_POST);
                $username = "";
                $class = "";
                $phone = "";
                // 关闭数据库连接
                mysqli_close($con);
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
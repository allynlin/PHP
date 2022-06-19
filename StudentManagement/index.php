<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>首页</title>
    <style>
        #toast {
            display: none;
            /*    悬浮在屏幕顶端*/
            position: fixed;
            top: 10px;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            z-index: 1200;
        }

        tr {
            text-align: center;
            width: auto;
            height: auto;
        }

        td {
            text-align: center;
            width: 100px;
            height: 20px;
            line-height: 20px;
        }

        .bg-drop {
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
        }

        .bg-light-1 {
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light-1 bg-drop">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="icon/person-fill.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            学生管理系统
            <button type="button" class="btn btn-outline-danger" onclick="logOut()">登出</button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" onclick="toMain()">首页</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        学生管理
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" onclick="toMain()">按姓名查找学生</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="toAdd()">添加学生</a></li>
                        <li><a class="dropdown-item" href="#" onclick="toDelMore()">批量删除学生</a></li>
                    </ul>
                </li>
            </ul>
            <form id="findStu" class="d-flex " method="post" role="search"
                  action="">
                <input class="form-control me-2 form-text" type="search" placeholder="Search" aria-label="Search"
                       name="username"
                       id="username">
                <button class="btn btn-outline-success" type="submit" id="search">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
    <div class="row" style="margin-top: 20px">
        <div id="toast">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto align-content-center">
                        <div class="alert alert-success" role="alert" id="toasttext">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                    按姓名查找学生
                </button>
                <button type="button" class="list-group-item list-group-item-action" onclick="toAdd()">添加学生</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="toDelMore()">批量删除学生
                </button>
                <button type="button" class="list-group-item list-group-item-action" disabled>修改学生</button>
            </div>
        </div>
        <div class="col-9 table-responsive" id="tab">
            <table class="table table-striped table-hover" id="Stu">
                <?php
                // 屏蔽错误信息
                error_reporting(0);
                if ($_GET['username']) {
                    $username = $_GET['username'];
                    if ($_POST) {
                        $username = $_POST['username'];
                        $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "123456");
                        $sql = "select * from student where username like '%$username%'";
                        $data = $pdo->query($sql)->fetchAll();
                        $num = 5;
                        $count = count($data);
                        $w = ceil($count / $num);
                        $page = 1;
                    } else {
                        $username = $_GET['username'];
                        $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "123456");
                        $sql = "select * from student where username like '%$username%'";
                        $data = $pdo->query($sql)->fetchAll();
                        $num = 5;
                        $count = count($data);
                        $w = ceil($count / $num);
                        $page = $_GET['page'] ?? 1;
                    }
                } else {
                    if ($_POST) {
                        $username = $_POST['username'];
                        $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "123456");
                        $sql = "select * from student where username like '%$username%'";
                        $data = $pdo->query($sql)->fetchAll();
                        $num = 5;
                        $count = count($data);
                        $w = ceil($count / $num);
                        $page = 1;
                    } else {
                        $username = "";
                        $pdo = new PDO("mysql:host=localhost;dbname=php", "root", "123456");
                        $sql = "select * from student where username like '%$username%'";
                        $data = $pdo->query($sql)->fetchAll();
                        $num = 5;
                        $count = count($data);
                        $w = ceil($count / $num);
                        $page = $_GET['page'] ?? 1;
                    }
                }
                $offset = ($page - 1) * $num;
                $sql = "select * from student where username like '%$username%' limit $offset,$num";
                $data = $pdo->query($sql)->fetchAll();
                $p = ($page == 1) ? 0 : ($page - 1);
                $n = ($page == $w) ? 0 : ($page + 1);
                echo "<thead>";
                echo "<tr>";
                echo "<th>姓名</th>";
                echo "<th>年龄</th>";
                echo "<th>班级</th>";
                echo "<th>操作</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($data as $v) {
                    echo "<tr>";
                    echo "<td>" . $v['username'] . "</td>";
                    echo "<td>" . $v['age'] . "</td>";
                    echo "<td>" . $v['userclass'] . "</td>";
                    echo "<td>
                        <button type='button' class='btn btn-outline-primary' onclick='alrt(" . $v['id'] . ")'>修改</button>
                        <button type='button' class='btn btn-outline-danger' onclick='delStu(" . $v['id'] . ")'>删除</button>
                    </td>";
                    echo "</tr>";
                }
                if ($page == 1) {
                    echo "首页";
                } else {
                    // 传值的时候同时传输字符串
                    echo "<a href='?page=1&username=$username'><button type='button'>首页</button></a>";
                }
                if ($p) {
                    echo "<a href='?page={$p}&username=$username'>上一页</a>";
                } else {
                    echo "上一页";
                }
                if ($n) {
                    echo "<a href='?page={$n}&username=$username'>下一页</a>";
                } else {
                    echo "下一页";
                }
                if ($page == $w) {
                    echo "尾页";
                } else {
                    echo "<a href='?page={$w}&username=$username'>尾页</a>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function delStu(id) {
        if (confirm("确定删除该学生吗？")) {
            window.location.href = "delStu.php?id=" + id;
        }
    }

    function alrt(id) {
        // 获取 id 在表格中的行
        var tr = document.getElementById(id);
        // console.log(tr);
        // 获取 id 在表格中的单元格
        var td = tr.getElementsByTagName("td");
        // 获取 id 在表格中的 id
        var id = td[0].innerHTML;
        // 获取 id 在表格中的姓名
        var username = td[1].innerHTML;
        // 获取 id 在表格中的年龄
        var age = td[2].innerHTML;
        // 获取 id 在表格中的班级
        var userclass = td[3].innerHTML;
        // console.log("id" + id);
        // console.log("username" + username);
        // console.log("age" + age);
        // console.log("userclass" + userclass);
        localStorage.setItem("id", id);
        localStorage.setItem("username", username);
        localStorage.setItem("age", age);
        localStorage.setItem("userclass", userclass);
        window.location.href = "alterStu.php?id=" + id;
    }

    function logOut() {
        window.location.href = "login.php";
    }

    function toAdd() {
        window.location.href = "addStudent.php"
    }

    function toDelMore() {
        window.location.href = "delMore.php"
    }

    function toMain() {
        window.location.href = "index.php";
    }
</script>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>批量删除</title>
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
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 80px">
    <div class="row" style="margin-top: 20px">
        <div class="col-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action" onclick="toMain()">
                    按姓名查找学生
                </button>
                <button type="button" class="list-group-item list-group-item-action" onclick="toAdd()">添加学生
                </button>
                <button type="button" class="list-group-item list-group-item-action active" onclick="toDelMore()"
                        aria-current="true">批量删除学生
                </button>
                <button type="button" class="list-group-item list-group-item-action" disabled>修改学生</button>
            </div>
        </div>
        <div class="col-9 table-responsive" id="tab">
            <form id="myform" method="post" action="">
                <table class="table table-striped table-hover" id="Stu">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "123456", "php");
                    $sql = "select * from student";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<thead><tr><th>id</th><th>姓名</th><th>年龄</th><th>班级</th><th>操作</th></tr></thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id='" . $row['id'] . "'><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["age"] . "</td><td>" . $row["userclass"] . "</td><td><input type='checkbox' name='stu[]' value='" . $row['id'] . "'></td></tr>";
                        }
                        echo "</tbody>";
                        echo "<script>
                    $('#toasttext').removeClass();
                    $('#toasttext').attr('class', 'alert alert-danger');
                    $('#toasttext').text('数据获取成功');
                    $('#toast').fadeIn();
                    setTimeout(function () {
                        $('#toast').fadeOut();
                    }, 2000);
                    </script>";
                    } else {
                        echo "<script>
                    $('#toasttext').removeClass();
                    $('#toasttext').attr('class', 'alert alert-danger');
                    $('#toasttext').text('数据为空');
                    $('#toast').fadeIn();
                    setTimeout(function () {
                        $('#toast').fadeOut();
                    }, 2000);
                    </script>";
                    }
                    ?>
                </table>
                <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 10px">
                    <button type="submit" class="btn btn-outline-danger" id="adSt">删除学生</button>
                    <button type="reset" class="btn btn-outline-secondary">reset</button>
                </div>
            </form>
        </div>
    </div>
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
</div>
</body>
</html>
<?php
if ($_POST) {
    $result = 0;
    $conn = mysqli_connect("localhost", "root", "123456", "php");
    $stus = $_POST['stu'];
    for ($i = 0; $i < count($stus); $i++) {
        $sql = "delete from student where id=" . $stus[$i];
        $result += $conn->query($sql);
    }
    if ($result) {
        echo "<script>
    $('#toasttext').removeClass();
    $('#toasttext').attr('class', 'alert alert-success');
    $('#toasttext').text('删除'+" . $result . "+'条数据成功');
    $('#toast').fadeIn();
    setTimeout(function () {
        $('#toast').fadeOut();
    }, 2000);
    setTimeout(function () {
        toMain();
    }, 3000);
    </script>";
    } else {
        echo "<script>
    $('#toasttext').removeClass();
    $('#toasttext').attr('class', 'alert alert-danger');
    $('#toasttext').text('删除失败');
    $('#toast').fadeIn();
    setTimeout(function () {
        $('#toast').fadeOut();
    }, 2000);
    </script>";
    }
}
?>
<script>
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
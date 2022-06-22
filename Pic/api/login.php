<?php
// 接收前端传来的数据
$username = $_POST['username'];
$password = $_POST['password'];
// 数据库查询
$link = mysqli_connect('localhost', 'root', '123456', 'php');
$sql = "select * from php.user where username='$username' and password='$password'";
// 执行sql语句,获取结果集
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    // 获取查询结果
    $row = $result->fetch_assoc();
    // 存储用户信息到 session 中
    session_start();
    $_SESSION['username'] = $row['username'];
    // 返回前端json数据
    echo json_encode(array(
        'code' => 200,
        'msg' => '登录成功'
    ));
} else {
    // 清空 session 中的用户信息
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    echo json_encode(array(
        'code' => 400,
        'msg' => '登录失败'
    ));
}
<?php
// 判断用户是否登录
session_start();
if (!isset($_SESSION['username'])) {
    echo json_encode(array(
        'code' => 600,
        'msg' => '请先登录'
    ));
    exit;
}
// 读取 session 中的用户信息
$username = $_SESSION['username'];
// 接收前端传来的数据
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
// 数据库查询
$link = mysqli_connect('localhost', 'root', '123456', 'php');
$sql = "select * from php.user where username='$username' and password='$oldPass'";
// 执行sql语句,获取结果集
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    // 更新数据库中的密码
    $sql = "update php.user set password='$newPass' where username='$username'";
    $result = mysqli_query($link, $sql);
    // 判断更新结果
    if ($result) {
        echo json_encode(array(
            'code' => 200,
            'msg' => '修改成功'
        ));
    } else {
        echo json_encode(array(
            'code' => 400,
            'msg' => '修改失败'
        ));
    }
} else {
    echo json_encode(array(
        'code' => 800,
        'msg' => '原密码错误'
    ));
}
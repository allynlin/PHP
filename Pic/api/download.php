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
// 接收前端传来的数据
$id = $_POST['id'];
// 数据库查询
$link = mysqli_connect('localhost', 'root', '123456', 'php');
$sql = "select filename from php.picture where id='$id'";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    // 获取查询结果
    $row = $result->fetch_assoc();
    // 返回前端json数据
    echo json_encode(array(
        'code' => 200,
        'msg' => '查询成功',
        'data' => $row
    ));
} else {
    echo json_encode(array(
        'code' => 400,
        'msg' => '查询失败'
    ));
}

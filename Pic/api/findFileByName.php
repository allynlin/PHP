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
$picname = $_POST['picname'];
// 数据库查询
$link = mysqli_connect('localhost', 'root', '123456', 'php');
// 模糊查询
$sql = "select * from php.picture where picname like '%$picname%' order by createtime desc";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    // 获取查询结果
    $row = $result->fetch_all(MYSQLI_ASSOC);
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
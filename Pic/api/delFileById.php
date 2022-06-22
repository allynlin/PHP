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
// 根据id查询filename
$sql = "select filename from php.picture where id = $id";
$filename_res = mysqli_query($link, $sql);
// 根据id删除数据
$sql = "delete from php.picture where id = $id";
$result = mysqli_query($link, $sql);
// 使用unlink()函数删除文件
$file = '../uploads/' . $filename_res->fetch_assoc()['filename'];
unlink($file);
// 判断查询结果
if ($result) {
    // 返回前端json数据
    echo json_encode(array(
        'code' => 200,
        'msg' => '删除成功'
    ));
} else {
    echo json_encode(array(
        'code' => 400,
        'msg' => '删除失败'
    ));
}
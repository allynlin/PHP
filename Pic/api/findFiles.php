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
// 连接数据库
$link = mysqli_connect('localhost', 'root', '123456', 'php');
// 查询 picture 表的所有数据，按照 createtime 倒序排列
$sql = "select * from php.picture order by createtime desc";
//$sql = "select * from php.picture";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    // 获取查询结果，并返回前端数组
//    $arr = array();
//    while ($row = $result->fetch_assoc()) {
//        $arr[] = $row;
//    }
    // 返回前端json数据
//    echo json_encode(array(
//        'code' => 200,
//        'msg' => '查询成功',
//        'data' => $arr
//    ));
} else {
    echo json_encode(array(
        'code' => 400,
        'msg' => '查询失败'
    ));
}
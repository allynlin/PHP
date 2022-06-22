<?php
// 接收前端数据
$picname = $_POST['picname'];
// 数据库查询
$link = mysqli_connect('localhost', 'root', '123456', 'php');
// 查询 picture 按照每页 6 条数据需要计算出总页数
$sql = "select * from php.picture";
$result = mysqli_query($link, $sql);
$total = $result->num_rows;
$pageSize = 6;
$totalPage = ceil($total / $pageSize);
// 查询 picture 表的所有数据
$sql = "select * from php.picture limit 0,$pageSize";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result->num_rows > 0) {
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    // 获取查询结果，并返回前端数组
    $arr = array();
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    // 返回前端json数据
    echo json_encode(array(
        'code' => 200,
        'msg' => '查询成功',
        'data' => $arr,
        'totalPage' => $totalPage
    ));
} else {
    echo json_encode(array(
        'code' => 400,
        'msg' => '查询失败'
    ));
}
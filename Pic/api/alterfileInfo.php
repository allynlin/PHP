<?php
// 接收前端上传的文件
$id = $_POST['id'];
$picname = $_POST['picname'];
$classify = $_POST['classify'];
$picintro = $_POST['picintro'];
// 将图片信息存入数据库
$link = mysqli_connect('localhost', 'root', '123456', 'php');
$sql = "update php.picture set picname='$picname',  classify='$classify', picintro='$picintro' where id='$id'";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result) {
    // 返回前端json数据
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
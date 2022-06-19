<?php
// 接收前端上传的文件
$id = $_POST['id'];
$file = $_FILES['userpic'];
$filename = $file['name'];
// 重命名文件名，UUID是一种唯一的字符串，可以作为文件名
$filename = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
$picname = $_POST['picname'];
$picsize = $_POST['picsize'];
$classify = $_POST['classify'];
$picintro = $_POST['picintro'];
// 将图片保存到服务器
$filepath = '../uploads/' . $filename;
move_uploaded_file($file['tmp_name'], $filepath);
// 将图片信息存入数据库
$link = mysqli_connect('localhost', 'root', '123456', 'php');
$sql = "update php.picture set filename='$filename', picname='$picname', picsize='$picsize', classify='$classify', picintro='$picintro' where id='$id'";
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
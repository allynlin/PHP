<?php
// 接收前端上传的文件
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
$sql = "insert into php.picture (filename, picname, picsize, classify, picintro) values ('$filename', '$picname', '$picsize', '$classify', '$picintro')";
$result = mysqli_query($link, $sql);
// 判断查询结果
if ($result) {
    // 返回前端json数据
    echo json_encode(array(
        'code' => 200,
        'msg' => '上传成功'
    ));
} else {
    echo json_encode(array(
        'code' => 400,
        'msg' => '上传失败'
    ));
}
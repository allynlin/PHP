<?php
// 清空 session
session_start();
unset($_SESSION['username']);
session_destroy();
// 返回前端json数据
echo json_encode(array(
    'code' => 200,
    'msg' => '退出成功'
));
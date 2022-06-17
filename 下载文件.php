<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        .margin-left {
            margin-left: 10px;
        }

        .margin-right {
            margin-right: 10px;
        }
    </style>
    <title>上传下载文件</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 margin-right">
            <form action="下载文件.php" method="post" enctype="multipart/form-data" class="white-pink">
                <h1>上传文件到files文件夹</h1>
                <label for="fileName">
                    <span>文件名：</span>
                    <input type="text" name="fileName" id="fileName">
                </label>
                <label for="exampleInputFile">
                    <span>文件：</span>
                    <input type="file" id="exampleInputFile" name="file">
                </label>
                <label>
                    <button type="submit" class="btn btn-default btn-block">上传</button>
                </label>
            </form>
            <?php
            // 文件上传
            if (isset($_FILES['file'])) {
                if ($_FILES['file']['error'] == 0) {
                    $fileName = $_FILES['file']['name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileType = $_FILES['file']['type'];
                    $filePath = 'files/' . $fileName;
                    // 接收文件
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                        // 使用JavaScript弹窗提示
                        //echo "<script>alert('上传成功！');</script>";
                        echo '<div class="col-md-12 white-pink-100">';
                        echo '文件上传成功！';
                        echo '<br>';
                        echo '文件名：' . $fileName;
                        echo '<br>';
                        // 转换文件大小为MB
                        echo '文件大小：' . round($fileSize / 1024 / 1024, 2) . 'MB';
                        echo '<br>';
                        echo '文件类型：' . $fileType;
                        // 如果设置了文件名就使用设置的文件名，否则使用原文件名
                        if ($_POST['fileName']) {
                            // 获取文件拓展名
                            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                            // 重命名文件
                            rename($filePath, 'files/' . $_POST['fileName'] . '.' . $extension);
                            // 获取重命名后的文件名
                            $filePath = 'files/' . $_POST['fileName'] . '.' . $extension;
                        } else {
                            // 拼接文件名为绝对路径
                            $filePath = 'files/' . $fileName;
                        }
                        // 判断文件类型
                        if ($fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/gif') {
                            echo '<br>';
                            echo '<img src="' . $filePath . '" style="width:100px;">';
                        }
                    } else {
                        echo '文件上传失败！';
                    }
                } else {
                    echo '文件上传失败';
                }
                echo "</div>";
                // 上传完成后删除表单中的文件
                unset($_FILES['file']);
                // 上传完成后删除表单中的文件名
                unset($_POST['fileName']);
            }
            ?>
        </div>
        <div class="col-md-6 white-pink margin-left">
            <h1>下载文件</h1>
            <?php
            // 屏蔽错误
            error_reporting(0);
            // 索引files文件夹
            $files = scandir('files');
            // 下载函数
            function download($filePath): void
            {
                // 获取文件名
                $fileName = pathinfo($filePath, PATHINFO_BASENAME);
                // 获取文件大小
                $fileSize = filesize($filePath);
                // 获取文件类型
                $fileType = mime_content_type($filePath);
                // 设置下载头
                header('Content-Type:' . $fileType);
                header('Content-Disposition:attachment;filename=' . $fileName);
                header('Content-Length:' . $fileSize);
                // 读取文件内容
                readfile($filePath);
            }

            // 以表格的形式输出文件名,文件大小,文件类型,下载按钮
            echo "<table class='table table-striped table-hover'>";
            echo "<tr><th>文件名</th><th>文件大小</th><th>文件类型</th><th>下载</th><th>删除</th></tr>";
            // 循环输出文件名
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    echo "<tr>";
                    // 复制文件名到另一个变量中
                    $filePath = 'files/' . $file;
                    // 如果文件名太长，则截取文件名
                    if (strlen($filePath) > 20) {
                        $filePath = substr($filePath, 0, 18) . '...';
                    }
                    echo "<td>$filePath</td>";
                    // 文件大小转换为mb
                    echo "<td>" . round(filesize("files/$file") / 1024 / 1024, 2) . "MB</td>";
                    echo "<td>" . mime_content_type("files/$file") . "</td>";
                    echo "<td><a href='?fileName=$file' class='btn btn-default margin-left'>下载</a></td>";
                    // 删除按钮
                    echo "<td><a href='?delFileName=$file' class='btn btn-danger margin-left'>删除</a></td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            // 输出记录的文件名
            //            if ($_GET['fileName']) {
            //                echo '<h1>记录的文件名</h1>';
            //                echo '<p>' . $_GET['fileName'] . '</p>';
            //            }
            // 按照记录的文件名来下载文件
            if ($_GET['fileName']) {
                download('files/' . $_GET['fileName']);
                // 下载完成后清除记录的文件名
                unset($_GET['fileName']);
            }

            // 删除文件
            if ($_GET['delFileName']) {
                // 输出删除的文件名
                // echo '<h1>删除的文件名</h1>';
                // echo '<p>' . $_GET['delFileName'] . '</p>';
                // 最后确认一遍是否删除,确认对话框告诉用户删除的文件名
                if (isset($_GET['delFileName'])) {
                    if (isset($_GET['confirm'])) {
                        // 删除文件
                        unlink('files/' . $_GET['delFileName']);
                        // 删除完成后清除记录的文件名
                        unset($_GET['delFileName']);
                        // 删除完成后重新输出文件列表
                        echo "<script>location.reload();</script>";
                    } else {
                        echo "<div class='alert alert-danger'>确认删除" . $_GET['delFileName'] . "文件吗?</div>";
                        echo "<a href='?delFileName=" . $_GET['delFileName'] . "&confirm=yes' class='btn btn-danger margin-left'>确认</a>";
                        echo "<a href='?delFileName=" . $_GET['delFileName'] . "' class='btn btn-default margin-left'>取消</a>";
                    }
                }
                //echo "<script>if(confirm('确定删除?')){location.href='?delFileName=" . $_GET['delFileName'] . "&del=true';}</script>";
                //删除文件
                //unlink('files/' . $_GET['delFileName']);
                //删除记录的文件名
                //unset($_GET['delFileName']);
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

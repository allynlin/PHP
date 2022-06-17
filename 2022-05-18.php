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
    <title>2022-05-13.php</title>
</head>
<body>
<div class="container">
    <div class="row">
        <!--        文件上传-->
        <div class="col-md-12">
            <form action="2022-05-18.php" method="post" enctype="multipart/form-data" class="white-pink">
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
                        }else{
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
            }
            ?>
        </div>
    </div>
</body>
</html>

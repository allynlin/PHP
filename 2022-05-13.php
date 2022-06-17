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
        <?php
        // 在当前目录下创建名为"doc.txt"的文件，并写入"锄禾日当午 汗滴禾下土"
        $file = fopen("doc.txt", "w");
        fwrite($file, "锄禾日当午 汗滴禾下土");
        fclose($file);
        ?>
    </div>
</div>
</body>
</html>

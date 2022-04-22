<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <title>逢7过</title>
    <style>
        .dangerous {
            color: red;
        }

        .safe {
            color: green;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 white-pink text-center">
            <?php
            for ($i = 1; $i <= 100; $i++) {
                if ($i % 10 == 7 || $i % 7 == 0) {
                    echo "<p class='dangerous'>$i</p>";
                } else {
                    echo "<p class='safe'>$i</p>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>国际象棋棋盘</title>
    <link href="css/white-pink.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <meta content="light dark" name="color-scheme">
    <style>
        table {
            width: 300px;
            height: 300px;
            border: 1px solid #000;
            text-align: center;
            margin: 0 auto;
        }

        td {
            width: 30px;
            height: 30px;
        }

        .white {
            background-color: #fff;
        }

        .black {
            background-color: #000;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>国际象棋棋盘</h1>
            <table>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 8; $j++) {
                        $k = $i + $j;
                        if ($k % 2 == 0) {
                            echo "<td class='white'></td>";
                        } else {
                            echo "<td class='black'></td>";
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>


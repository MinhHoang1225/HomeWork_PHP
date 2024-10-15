<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $tong = 0;
        $tongChan = 0;
        $tongLe = 0;

        for($i = 0; $i <= 15; $i++) {
            $tong += $i;
            if ($i % 2 == 0) {
                $tongChan += $i; 
            } else {
                $tongLe += $i; 
            }
        }
        echo "Tổng: $tong<br>";
        echo "Tổng số chẵn: $tongChan<br>";
        echo "Tổng số lẻ: $tongLe<br>";
    ?>
     
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="ttl">Chess Board</h1>
    <table>
        <?php
        function drawChessBorad($rows, $cols)
        {
            $even = "black";
            $odd = "white";
            if (is_numeric($rows) == false && is_numeric($cols) == false) {
                echo "rows and cols parameters must be number";
            } else if (is_numeric($rows) == false && $cols <= 0) {
                echo "rows parameter must be number.cols parameter must be greater than 0";
            } else if (is_numeric($cols) == false && $rows <= 0) {
                echo "cols parameter must be number.rows parameter must be greater than 0";
            } else if (is_numeric($rows) == false) {
                echo "rows parameter must be number";
            } else if (is_numeric($cols) == false) {
                echo "cols parameter must be number";
            } else if (($rows && $cols) <= 0) {
                echo "rows and cols parmeters must be greater than 0";
            } else if ($rows <= 0) {
                echo "rows parameter must be greater than 0";
            } else if ($cols <= 0) {
                echo "cols parameter must be greater than 0";
            } else {
                for ($i = 1; $i <= $rows; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= $cols; $j++) {
                        $total = $i + $j;
                        if ($total % 2 == 0) {
                            echo "<td class='black'></td>";
                        } else {
                            echo '<td class="' . $odd . '"></td>';
                        }
                    }
                    echo "</tr>";
                }
            }
        }
        drawChessBorad(8, 8);
        ?>
    </table>
</body>
</html>
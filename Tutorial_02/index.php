<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_02</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="wrapper">
    <h1 class="ttl">Diamond Pattern</h1>
    <?php

    function makeDiamondShape($row)
    {
        if (is_numeric($row) == false) {
            echo "row parameter must be number";
        } else if ($row % 2 == 0) {
            echo "row parameter must be odd number";
        } else {


            switch ($row) {
                case 1;
                    for ($i = 1; $i <= $row; $i++) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 1) && $j <= $row + ($i - 1)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    for ($i = $row - 1; $i >= 1; $i--) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 1) && $j <= $row + ($i - 1)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    break;

                case 3;
                    for ($i = 1; $i <= $row; $i++) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 3) && $j <= $row + ($i - 3)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    for ($i = $row - 1; $i >= 1; $i--) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 1) && $j <= $row + ($i - 1)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    break;

                case 5;
                    for ($i = 1; $i <= $row; $i++) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 3) && $j <= $row + ($i - 3)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    for ($i = $row - 1; $i >= 1; $i--) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 3) && $j <= $row + ($i - 3)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    break;

                default;
                    for ($i = 1; $i <= $row; $i++) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 2) && $j <= $row + ($i - 2)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    for ($i = $row - 1; $i >= 1; $i--) {

                        for ($j = 1; $j <= (2 * $row) - 1; $j++) {

                            if ($j >= $row - ($i - 2) && $j <= $row + ($i - 2)) {
                                echo "*";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                        }
                        echo "<br>";
                    }
                    break;
            }
        }
    }
    makeDiamondShape(9);
    ?>
</body>

</html>
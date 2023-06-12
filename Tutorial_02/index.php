<?php
function makeDiamondShape($row)
{
    if (is_numeric($row) == false) {
        echo "row parameter must be number";
    } else if ($row % 2 == 0) {
        echo "row parameter must be odd number";
    } else {
        for ($i = 0; $i < $row; $i++) {
            $numSpaces = abs($row - 2 * $i - 1) / 2;
            $numStars = $row - $numSpaces * 2;

            for ($j = 0; $j < $numSpaces; $j++) {
                echo "&nbsp ";
            }
            for ($j = 0; $j < $numStars; $j++) {
                echo "*";
            }
            echo "<br/>";
        }
    }
}
?>
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
    <div class="container">
        <div class="diamond">
            <?php makeDiamondShape(1); ?>
        </div>
    </div>
</body>

</html>
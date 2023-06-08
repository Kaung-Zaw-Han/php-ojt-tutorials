<?php
function createPhoneNumber($numberArray)
{
    $result = "";
    foreach ($numberArray as $index => $number) {
        if ($index === 0) {
            $result = "(" . $number;
        } elseif ($index === 2) {
            $result = $result . $number . ") ";
        } elseif ($index === 5) {
            $result = $result . $number . "-";
        } else {
            $result = $result . $number;
        }
    }
    echo $result;
}
createPhoneNumber([1, 1, 1, 1, 1, 1, 1, 1, 1, 1]);
?>

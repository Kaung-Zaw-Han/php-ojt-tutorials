<?php
function arrayDiff($arr1, $arr2)
{
    $diff = [];
    foreach ($arr1 as $value1) {
        $found = false;
        foreach ($arr2 as $value2) {
            if ($value1 === $value2) {
                $found = true;
            }
        }
        if (!$found) {
            $diff[] = $value1;
        }
    }
    $result = '[' . implode(', ', $diff) . ']';
    echo $result;
}
arrayDiff([1, 2, 3], [1, 2]);
?>

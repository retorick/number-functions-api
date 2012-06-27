<?php
$pascal = array(
    array(1),
    array(1, 1),
    array(1, 2, 1),
    array(1, 3, 3, 1),
    array(1, 4, 6, 4, 1),
    array(1, 5, 10, 10, 5, 1),
    array(1, 6, 15, 20, 15, 6, 1),
);

function build_triangle($rows = 20) 
{
    $pascal = array(
        array(1)
    );

    $i = sizeof($pascal);

    while ($i < $rows) {
        $prev_row = $pascal[$i - 1];
        $new_row = array();
        $new_row[] = 1;
        $j = 0;
        while ($j < sizeof($prev_row)) {
            $a = $prev_row[$j];
            $b = $j == sizeof($prev_row)-1 ? 0 : $prev_row[$j+1];
            $new_row[] = $a + $b;
            $j++;
        }
        $pascal[] = $new_row;
        $i++;
    }

    return $pascal;
}

$pascal = build_triangle();
?>

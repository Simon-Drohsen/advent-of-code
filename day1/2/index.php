<?php
$input = file('../data.txt');

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = rtrim($input[$i]);
}

foreach ($input as $pair) {
    list($left, , , $right) = explode(' ', trim($pair));

    $column1[] = (int)$left;
    $column2[] = (int)$right;
}

sort($column1);
sort($column2);

$countedValuesColumn2 = array_count_values($column2);

$result = 0;

foreach ($column1 as $num) {
    $countInRight = $countedValuesColumn2[$num] ?? 0;
    $result += $num * $countInRight;
}

echo $result;

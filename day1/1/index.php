<?php
$input = file('../data.txt');

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = rtrim($input[$i]);
}

foreach ($input as $pair) {
    list($left, $test, $test2, $right) = explode(' ', trim($pair));

    $column1[] = $left;
    $column2[] = $right;
}

sort($column1);
sort($column2);

$occurrences = array_count_values($column1);

$result = [];
foreach ($column2 as $column2Value) {
    $result[$column2Value] = $occurrences[$column2Value] ?? 0;
}

$result = 0;

for ($i = 0; $i < count($column1); $i++) {
    $result += abs($column1[$i] - $column2[$i]);
}

echo $result;

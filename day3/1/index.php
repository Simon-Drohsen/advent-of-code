<?php

$input = file('../data.txt');
$pattern = '/mul\((\d{1,3}),(\d{1,3})\)/';
$result = 0;

foreach ($input as $line) {
    if (preg_match_all($pattern, $line, $matches)) {
        for ($i = 0; $i < count($matches[1]); $i++) {
            $x = (int)$matches[1][$i];
            $y = (int)$matches[2][$i];
            $result += $x * $y;
        }
    }
}

var_dump($result);

<?php

$input = file('../data.txt');

for ($i = 0; $i < count($input); $i++) {
    $input[$i] = rtrim($input[$i]);
}

$reportArr = [];

foreach ($input as $report) {
    $reportArr[] = explode(' ', $report);
}

$result = 0;

foreach ($reportArr as $key => $report) {
    if (isSafeReport($report)) {
        $result++;
    }
}

var_dump($result);

function isSafeReport($report) {
    if (isStrictlySafe($report)) {
        return true;
    }

    // Try removing each level and check if the modified report is safe
    for ($i = 0; $i < count($report); $i++) {
        $modifiedReport = $report;
        array_splice($modifiedReport, $i, 1);

        if (isStrictlySafe($modifiedReport)) {
            return true;
        }
    }

    return false;
}

function isStrictlySafe($report) {
    $isIncreasing = true;
    $isDecreasing = true;

    for ($i = 1; $i < count($report); $i++) {
        $diff = $report[$i] - $report[$i - 1];

        if (abs($diff) < 1 || abs($diff) > 3) {
            return false;
        }

        if ($diff > 0) {
            $isDecreasing = false;
        } elseif ($diff < 0) {
            $isIncreasing = false;
        }
    }

    return $isIncreasing || $isDecreasing;
}


<?php
$input = file('../data.txt');
$executingPattern = "/(?:^|do\(\))([\s\S]*?)(?:don't\(\)|$)/";
$funcArr = [];
$result = 0;

foreach ($input as $line) {
    if (preg_match_all($executingPattern, $line, $matches)) {
        $funcArr[] = $matches[1];
    }
}

foreach ($funcArr as $value) {
//    var_dump($funcArr);
    $result += getMultiplier($value);
}

var_dump($result);

function getMultiplier($arr): int
{
    $mulPattern = '/mul\((\d{1,3}),(\d{1,3})\)/';
    $result = 0;

    foreach ($arr as $str) {
        if (preg_match_all($mulPattern, $str, $matches)) {
            for ($j = 0; $j < count($matches[1]); $j++) {
                $x = (int)$matches[1][$j];
                $y = (int)$matches[2][$j];
                $result += $x * $y;
            }
        }
    }

    return $result;
}

//var_dump($result);

//  for ($i = 0; $i+7 < strlen($line); $i++) {
//        $do = $line[$i] . $line[$i + 1] . $line[$i + 2] . $line[$i + 3];
//        $dont = $line[$i] . $line[$i + 1] . $line[$i + 2] . $line[$i + 3] . $line[$i + 4] . $line[$i + 5] . $line[$i + 6];
//        if ($dont === "don't()") {
//            $execute = false;
//        } elseif ($do === "do()") {
//            $execute = true;
//        }
//
//        if ($execute && preg_match_all($mulPattern, $line, $matches)) {
//            for ($j = 0; $j < count($matches[1]); $j++) {
//                $x = (int)$matches[1][$j];
//                $y = (int)$matches[2][$j];
//                $result += $x * $y;
//            }
//        }
//    }

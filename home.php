<?php

$arraymy = [
0 => 5,
1 => 4,
2 => array (
            12 => 123,
            13 => 345,
            14 => 678,
            15 => 123
            ),
3 => 5,
4 => 5,
5 => 6,
6 => 5,
7 => 1,
];
$temp = [];
foreach ($arraymy as $val){

    if (!in_array($val, $temp)){
        $temp[]=$val;
    }

    echo ($val);
}

//var_dump(count($arraymy));



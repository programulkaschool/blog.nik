<?php
$cat = [
    7 => "cars",
    5 => "food",
    91 => "home",
    1 => "work",
    87 => "days",
    3 => "game"

];

$number = [
    0 => 7,
    1 => 5,
    2 => array(
        6 => 91,
        7 => 1,
        8 =>87,
        9 => 91,
    ),
    3 => 7,
    4 => 3,
    5 => 7
];

$new = [];
foreach ($number as $value){
    if (!in_array($value, $new)){
        if (!is_array($value)){
            $new [] = $value;
        }

    }

   foreach ($value as $second_val){
       if (!in_array($second_val, $new)){
           if (!is_array($second_val)){
               $new [] = $second_val;
           }
       }
   }
}

foreach ($new as $val){
    foreach ($cat as $key => $val1){
        if ($val == $key){
            echo $val1;
        }
    }
}


//var_dump($new);


?>
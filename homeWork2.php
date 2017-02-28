<?php
/**
 * Created by PhpStorm.
 * User: sokolskih
 * Date: 28.02.2017
 * Time: 16:31
 */



/*  задание №1*/
$animals = [
    1 => 'корова',
    2 => 'коза',
    'qwert' => 'верблюд'
];

function printParagrah($arrayString, $flag = false)
{
    $resultString = "";
    foreach ($arrayString as $key => $value) {
        if ($flag) {
            $resultString .= '<p>' . $value . '</p>';
        } else {
            echo '<p>' . $value . '</p>';
        }
    }
    if ($flag) {
        return $resultString;
    }
}

printParagrah($animals);
printParagrah($animals, true);


/*  задание №2*/

function mathOperation($arrayIndex, $operation){


}
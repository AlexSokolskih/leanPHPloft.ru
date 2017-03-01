<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
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

/*Функция должна принимать 2 параметра:
массив чисел;
строку, обозначающую арифметическое действие,    которое нужно выполнить со всеми элементами массива.
Функция должна вывести результат на экран.
Функция должна обрабатывать любой ввод, в том числе некорректный и выдавать сообщения об этом
*/

$operands = [
    0 => 10,
    1 => 2,
    2 => 5,
];


//вариант 1
function mathOperation($arrayOperands, $operation)
{
    function applyOperation($arrayOperands, $functionForApply)
    {
        $result = 0;
        foreach ($arrayOperands as $key => $item) {
            if (!is_numeric($item)) {
                echo '<p>ошибка неправильный аргумент в массиве чисел:' . $item . '</p>';
            }
            if ($key == 0) {
                $result = $item;
            } else {
                $result = $functionForApply ($result, $item);
            }
        }
        return $result;
    }

    switch ($operation) {
        case '+':
            echo(applyOperation($arrayOperands, function ($arg1, $arg2) {
                return ($arg1 + $arg2);
            }));
            break;
        case '-':
            echo(applyOperation($arrayOperands, function ($arg1, $arg2) {
                return ($arg1 - $arg2);
            }));
            break;
        case '*':
            echo(applyOperation($arrayOperands, function ($arg1, $arg2) {
                return ($arg1 * $arg2);
            }));
            break;
        case '/':
            echo(applyOperation($arrayOperands, function ($arg1, $arg2) {
                return ($arg1 / $arg2);
            }));
            break;
        default:
            echo 'ошибка, неправильное арифметическое действие.';
            break;
    }
}

mathOperation($operands, '/');
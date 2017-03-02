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

function mathOperation($arrayOperands, $operation)
{


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
            echo '<p>ошибка, неправильное арифметическое действие.</p>';
            break;
    }
}

mathOperation($operands, '/');
echo '<br>';

/*
 Задание #3

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
 */

function mathOperationPlus($operand)
{
    if (!($operand == '-' or $operand == '+' or $operand == '*' or $operand == '/')) {
        echo '<p> ошибка в функции mathOperation2 неправильный первый аргумент </p>';
        return;
    }
    for ($i = 1; $i < func_num_args(); $i++) {
        $arguments[] = func_get_arg($i);
    }
    echo '<p>Результат работы функции mathOperation2</p>';
    mathOperation($arguments, $operand);
}

mathOperationPlus('+', 2, 5, 10);

/*
Задание #4

Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
 В остальных случаях выдавать корректную ошибку.
*/

function showTableMultiplication($param1, $param2)
{
    if (!(is_int($param1) and is_int($param2))) {
        throw new Exception('ошибка параметр не целое число');
        return;
    }
    echo '<table style="border: dotted 2px black">';
    for ($i = 1; $i <= $param1; $i++) {
        echo "<tr> ";
        for ($j = 1; $j <= $param2; $j++) {
            if ($i == 1) {
                echo '<th>' . $j . '</th>';
            } else {
                $amount = $i * $j;
                echo '<td>' . $amount . '</td>';
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

showTableMultiplication(10, 20);

/*Задание #5

Написать две функции.
Функция №1 принимает 1 строковый параметр и возвращает true, если строка является палиндромом*, false в противном случае. Пробелы и регистр не должны учитываться.
Функция №2 выводит сообщение в котором на русском языке оговаривается результат из функции №1
* Палиндром – строка, одинаково читающаяся в обоих направлениях.*/

function mb_strrev($str)
{
    $reverseString = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $reverseString .= $str[mb_strlen($str) - $i - 1];
    }
    return $reverseString;
}

function mb_strcasecmp($str1, $str2)
{
    if (mb_strlen($str1) != mb_strlen($str2)) {
        return false;
    }
    for ($i = 0; $i < mb_strlen($str1); $i++) {
        if (str1[$i] != $str2[$i]) {
            return false;
        }
    }
    return true;
}

function is_polindrom($strLine)
{
    $strReverse = mb_strrev($strLine);
    if (mb_strcasecmp($strLine, $strReverse) == 0) {
        return true;
    } else {
        return false;
    }
}

function speakOnRussian($flag)
{
    if ($flag == true) {
        echo '<p> Строка является полиномом </p>';
    } else {
        echo '<p> Строка не является полиномом </p>';
    }

}

echo is_polindrom('фвфывфывфыв');
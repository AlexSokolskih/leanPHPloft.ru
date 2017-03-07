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

//
$animals = [
    1 => 'корова',
    2 => 'коза',
    'qwert' => 'верблюд'
];

function printParagrah($arrayString, $flag = false)
{
    $resultString = "";

    foreach ($arrayString as $value) {
        if ($flag) {
            $resultString .= $value . ' ';
        } else {
            echo '<p>' . $value . '</p>';
        }
    }

    if ($flag) {
        return $resultString;
    }
}

printParagrah($animals);
echo printParagrah($animals, true);


/*  задание №2*/

/*Функция должна принимать 2 параметра:
массив чисел;
строку, обозначающую арифметическое действие,    которое нужно выполнить со всеми элементами массива.
Функция должна вывести результат на экран.
Функция должна обрабатывать любой ввод, в том числе некорректный и выдавать сообщения об этом
*/

$operands = [10, 2, 5];


function applyOperation($arrayOperands, $functionForApply)
{

    if (!is_array($arrayOperands)) {
        echo '<p>ошибка неправильный аргумент должен быть массив:</p>';
        return false;
    }

    $result = 0;
    foreach ($arrayOperands as $key => $item) {
        if (!is_numeric($item)) {
            echo '<p>ошибка неправильный аргумент в массиве чисел:' . $item . '</p>';
            return false;
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
                if ($arg2 == 0) {
                    echo '<p> ошибка, нельзя делить на ноль!</p>';
                    return false;
                }
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
    try {
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
    } catch (Exception $e) {
        echo "Во время работы произошла ошибка подробнее: " . $e->getMessage() . '<br>';
    }
}

showTableMultiplication(10.12, 20);

/*Задание #5

Написать две функции.
Функция №1 принимает 1 строковый параметр и возвращает true, если строка является палиндромом*, false в противном случае. Пробелы и регистр не должны учитываться.
Функция №2 выводит сообщение в котором на русском языке оговаривается результат из функции №1
* Палиндром – строка, одинаково читающаяся в обоих направлениях.*/

function mb_strrev($str)
{
    $reverseString = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $reverseString .= mb_substr($str, mb_strlen($str) - $i - 1, 1);
    }
    return $reverseString;
}


function is_polindrom($strLine)
{
    $strReverse = mb_strrev($strLine);
    if ($strLine === $strReverse) {
        return true;
    } else {
        return false;
    }
}

function speakOnRussian($flag)
{
    if ($flag == true) {
        echo '<p> Строка является полиндромом </p>';
    } else {
        echo '<p> Строка не является полиндромом </p>';
    }
}


speakOnRussian(is_polindrom('йцуккуцй'));

/*Задание #7 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Дана строка: “Карл у Клары украл Кораллы”. удалить из этой строки все заглавные буквы “К”.
Дана строка “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание.
*/

$string1 = 'Карл у Клары украл Кораллы';
$string1 = str_replace('К', '', $string1);
echo '<br>' . $string1 . '<br>';

$string2 = 'Две бутылки лимонада';
$string2 = str_replace('Две', 'Три', $string2);
echo $string2 . '<br>';

/*Задание #8 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Напишите функцию, которая с помощью регулярных выражений, получит информацию о переданных RX пакетах из переданной строки:
Пример строки: “RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. “
Если кол-во пакетов более 1000, то выдавать сообщение: “Сеть есть”
Если в переданной в функцию строке есть “:)”, то нарисовать смайл в ASCII и не выдавать сообщение из пункта №3. Смайл должен храниться в отдельной функции
*/
function viewSmile()
{
    echo '<br>
░░░░░░░░░░░░░░░░░░░░░░░░░/█\<br>                    
░░░░░░░░░░░░░░░░░░░░░░░░ /██\<br>
░░░░░░░░░░░░░░░░░░░░░░░ /████\<br>
░░░░░░░░░░░░░░░░░░░░░░ /██████\<br>
░░░░░░░░░░░░░░░░░░░░░ /████████\<br>
░░░░░░░░░░░░░░░░░░░░ /██████████\<br>
░░░░░░░░░░░░░░░░░░░ /████████████\<br>
░░░█████░░░░░░░░░░ /██████████████\<br>
░░█▒▒▒▒▒█░░░░░░░░ /████████████████\<br>
░░█▒▒▒▒▒▒█░░░░░░███▒▒▒▒▒▒▒▒▒▒▒▒▒████<br>
░░░█▒▒▒▒▒ █░░░░ ██▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██<br>
░░░░█▒▒▒▒█ ░░░██▒▒▒▒▒██ ▒▒▒▒▒▒██ ▒▒▒▒▒██<br>
░░░░░█▒▒▒█░░░█▒▒▒▒▒▒████▒▒▒▒████▒▒▒▒▒▒█<br>
░░░█████████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██<br>
░░░█▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▒▒██<br>
░██▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒██▒▒▒▒▒▒▒▒▒▒██▒▒▒▒██<br>
██▒▒▒███████████▒▒▒▒▒██▒▒▒▒▒▒█▒██▒▒▒▒▒██<br>
█▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒████████▒▒▒▒▒▒▒█<br>
██▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▒▒▒▒▒▒▒▒██▒▒▒▒▒██<br>
░█▒▒▒███████████ ▒▒▒▒▒▒▒▒▒▒▒▒▒▒██▒▒▒██<br>
░██▒▒▒▒▒▒▒▒▒▒████▒▒▒▒▒▒▒▒▒▒▒▒▒▒██▒██<br>
░░████████████░░░█████████████████<br>';
}

echo is_polindrom('фвфывфывфыв');

/*Задание #6 (выполняется после вебинара “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)

Выведите информацию о текущей дате в формате 31.12.2016 23:59
Выведите unixtime время соответствующее 24.02.2016 00:00:00.
*/ 
$date = date('d.m.Y H:i');
echo($date);
$date2 = date_parse_from_format("d.m.Y", '24.02.2016 00:00:00');

var_dump($date2);
mktime($date2['year']);



$stringRX = 'RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. :)';


function getRX($stringRX)
{
    if (preg_match("/\:\)/", $stringRX)) {
        viewSmile();
        return;
    }
    if (preg_match("/^RX packets:(.*?) errors/", $stringRX, $rez)) {
        if ($rez[1] > 1000) {
            echo 'сеть есть!';
        }
    }
}
getRX($stringRX);








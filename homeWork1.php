<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 25.02.2017
 * Time: 13:01
 */

/* Задание #1  */
$name = "Александр";
$age = '32';
echo "Меня зовут: $name <br>";
print "Мне $age лет <br>";
echo '"!|\\/\'"\\ <br>';

/* Задание #2  */
$picture = 80;
$pictureFeltpen = 23;
$picturePencil = 40;
$picturePain = $picture - $pictureFeltpen - $picturePencil;
echo "На школьной выставке $picture рисунков. $pictureFeltpen  из них выполнены фломастерами, $picturePencil карандашами, а остальные $picturePain красками <br>";


/* Задание #3   */
define('MYCONST', 'моя константа');
if (defined('MYCONST')) {
    echo "Константа существует! <br>";
}
echo MYCONST . '<br>';
define('MYCONST', 'моя константа2');
echo MYCONST . '<br>';

/* Задание #4   */
$age = rand(1, 100);
echo "вам $age лет <br>";
if (($age >= 18) and ($age <= 65)) {
    echo "вам еще работать и работать <br>";
} elseif ($age > 65) {
    echo "вам пора на пенсию <br>";
} elseif ((1 <= $age) and ($age <= 17)) {
    echo "Вам еще рано работать <br>";
} else {
    echo "неизвестный возраст <br>";
}

/* Задание #5   */

$day = rand(1, 10);
echo 'День №' . $day . '<br>';
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день <br>';
        break;
    case 6:
    case 7:
        echo 'Это   выходной   день <br>';
        break;
    default:
        echo 'Неизвестный   день <br>';
}


/* Задание #6   */
$bmw['model'] = "X5";
$bmw['speed'] = 120;
$bmw['doors'] = 5;
$bmw['year'] = "2015";

$toyota['model'] = "LandCruiser";
$toyota['speed'] = 130;
$toyota['doors'] = 5;
$toyota['year'] = "2016";

$opel = [
    'model' => "astra",
    'speed' => 160,
    'doors' => 3,
    'year' => "2014",
];

$auto['bmw'] = $bmw;
$auto['toyota'] = $toyota;
$auto['opel'] = $opel;

foreach ($auto as $key => $value) {
    echo "CAR $key <br>";
    echo $value['model'] . " ";
    echo $value['speed'] . " ";
    echo $value['doors'] . " ";
    echo $value['year'] . "<br>";
}

/* Задание # 7  */
echo '<table style="border: dotted 2px black">';
for ($i = 1; $i <= 10; $i++) {
    echo "<tr> ";
    for ($j = 1; $j <= 10; $j++) {
        if ($i == 1) {
            echo '<th>' . $j . '</th>';
        } else {
            $amount = $i * $j;
            if (($i % 2 == 0) and ($j % 2 == 0)) {
                $amount = "(" . $amount . ")";
            } elseif (($i % 2 != 0) and ($j % 2 != 0)) {
                $amount = "[" . $amount . "]";
            }
            echo '<td>' . $amount . '</td>';
        }

    }
    echo "</tr>";
}
echo "</table>";

/* Задание #8   */
$str = 'электровоз чайник триста крокодил';
echo $str . '<br>';
$myarray = explode(' ', $str);
print_r($myarray);
echo '<br>';
$i = 0;
while ($i < count($myarray)) {

    $arrayReverse[] = $myarray[count($myarray) - $i - 1];
    $i++;
}
var_dump($arrayReverse);
echo '<br>';

$newString = implode(",", $arrayReverse);
echo $newString;


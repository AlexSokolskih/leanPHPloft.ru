<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18.02.2017
 * Time: 20:12
 */

echo ("<br>Задание один<br>");
$x1 = rand(1, 100);
$x2 = rand(1, 100);
echo($x1.' + '.$x2.' = '.($x1 + $x2));

echo ("<br>Задание два<br>");

for ($i = 1; $i < 11; $i++) {
    if ($i % 2 == 0) {
        echo $i;
    }
}

?>
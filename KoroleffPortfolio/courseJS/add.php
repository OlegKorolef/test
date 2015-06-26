<?php
$name = $_POST['name'];
$count = $_POST['count'];

$f = fopen('results.txt', 'a+');
fwrite($f, $name . ":" . $count . "\n");
fclose($f);
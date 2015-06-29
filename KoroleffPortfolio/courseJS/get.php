<?php

$maxLine = $_POST['maxLine'];
$results = file('results.txt');

foreach ($results as $result)
{
	$arr = explode(':', $result);
	$names[] = $arr[0];
	$counts[] = $arr[1];
}

array_multisort($counts, SORT_NUMERIC, SORT_ASC,
				$names);
$data = array_combine($names, $counts);
arsort($data, SORT_NUMERIC);

$results = [];
foreach ($data as $key=>$el)
{
	$arr['name'] = $key;
	$arr['count'] = $el;	
	$results[] = $arr;
}

$messages = array_slice($results, 0, $maxLine);
echo json_encode($messages);
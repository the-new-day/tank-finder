<?php 

require_once 'db.php';
$db = new Database();

$paramsList = '';
$params = json_decode($_POST['params'], true);

// print_r($params);
// exit();

if ($params) {
	$paramsList = ' WHERE ';
}

$i = 0;
foreach ($params as $param => $value) {
	if (!$value && $value != 0) {
		continue;
	}

	// if ($param == '') {
	// 	exit($value);
	// }

	if (is_numeric($value) && is_double((double)$value)) {
		$paramsList .= "`$param` LIKE ?";
	} else {
		$paramsList .= "`$param` = ?";
	}

	if ($i < count($params) - 1) {
		$paramsList .= ' AND ';
	}

	$i++;
}

const NATIONS = [
	'ussr' => 'СССР',
	'germany' => 'Германия',
	'usa' => 'США',
	'china' => 'Китай',
	'japan' => 'Япония',
	'italy' => 'Италия',
	'sweden' => 'Швеция',
	'czech' => 'Чехословакия',
	'poland' => 'Польша',
	'france' => 'Франция',
	'uk' => 'Великобритания'
];

const TYPES = [
	'lighttank' => 'Лёгкий танк',
	'mediumtank' => 'Средний танк',
	'heavytank' => 'Тяжёлый танк',
	'at-spg' => 'ПТ-САУ',
	'spg' => 'САУ',
];

$result = [];
$resultDb = $db->execute('SELECT * FROM `tanks`' . $paramsList, array_values($params));

$i = 0;
foreach ($resultDb as $tank => $params) {
	$result[$i] = [
		'name' => $params['name'],
		'nation' => 'Unknown',
		'level' => $params['level'],
		'type' => $params['type']
	];

	if (isset(NATIONS[$params['nation']])) {
		$result[$i]['nation'] = NATIONS[$params['nation']];
	}
	
	if (isset(TYPES[$params['type']])) {
		$result[$i]['type'] = TYPES[$params['type']];
	}

	$i++;
}

echo json_encode($result);	

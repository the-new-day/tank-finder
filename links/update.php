<?php

set_time_limit(0);

$timeStart = microtime(true); 

require '../db.php';

function clearValue($value) {
	// echo $value;
	// if (strpos($value, 'мин-1') !== false) {
	// 	exit($value);
	// }
	$value = str_replace('мин-1', '', $value);
	return trim(preg_replace('~[^\d\./]~', '', $value), './');
}

function splitIntoLines($text) {
	$text = preg_replace('~\n+~', PHP_EOL, $text);
	$text = preg_replace('~ +~', ' ', $text);
	$text = trim($text);

	return $text;
}

$dom = new DOMDocument;
libxml_use_internal_errors(true);

$characteristics = [
	'ammo' => 'Боекомплект', //
	'rof' => 'Скорострельность', //
	'vas' => 'Скорость ВН', //
	'vaa' => 'Углы ВН', // // needs special parsing
	'haa' => 'Углы ГН', //
	'har' => 'Корпус', //
	'tar' => 'Башня', //
	'mwgt' => 'пред. масса', // // needs special parsing (get only 2nd part of characteristic) 
	'epo' => 'Мощность двигателя', // 
	'mrv' => 'Макс. скорость', // // needs special parsing (get only 2nd part of characteristic) 
	'stls' => 'Незаметность стоя', //
	'stlm' => 'Незаметность в движении', //
	'rcr' => 'Дальность связи', //
];

$tanks = json_decode(file_get_contents('spg-links.json'), true);
$db = new Database();

$bindings;



try {
foreach ($tanks as $name => $link) {
	//echo $name, PHP_EOL;
	// if (!in_array($name, ['M36 Jackson','M18 Hellcat','T78','T25 AT','T25/2','M56 Scorpion','T28 Concept','Super Hellcat','T28','T28 Prototype','TS-5','T30','T95','T110E4','T110E3','T-26G FT','M3G FT','SU-76G FT','60G FT','WZ-131G FT','T-34-2G FT','WZ-111-1G FT','WZ-120-1G FT','WZ-111G FT','WZ-113G FT','Renault FT AC','FCM 36 Pak 40','Renault UE 57','Somua SAu 40','S35 CA','M10 RBFM','ARL V39','AMX AC mle. 46','AMX AC mle. 48','AMX Canon d\'assaut 105','AMX 50 Foch','AMX 50 Foch (155)','AMX 50 Foch B','Universal Carrier 2-pdr','Valentine AT','Alecto','AT 2','Archer','AT 8','Churchill Gun Carrier','Achilles','Excalibur','AT 7','Challenger','AT 15A','AT 15','Charioteer','GSOR 1008','Turtle Mk. I','FV4004 Conway','Tortoise','FV215b (183)','FV4005 Stage II','FV217 Badger','Pvlvv fm/42','Ikv 72','Sav m/43','Ikv 103','Ikv 65 Alt II','Ikv 90 Typ B','UDES 03','Strv S1','Strv 103-0','Strv 103B'])) {
	// 	continue;
	// }

	$dom->loadHtml(file_get_contents('https://wiki.wargaming.net' . $link));
	$text = $dom->getElementById('stockTTH')->textContent;
	$text = splitIntoLines($text);
	$characterLines = explode(PHP_EOL, $text);
	$characterLines = array_map(fn($str) => trim($str), $characterLines);

	$sql = 'UPDATE `tanks` SET ';
	$bindings = [];
	$gotCharacteristics = [];

	foreach ($characteristics as $c => $word) {
		$sql .= $c . ' = ?';
		if (next($characteristics)) {
			$sql .= ', ';
		}

		foreach ($characterLines as $i => $line) {
			if (strpos($line, $word) !== false) {
				$line = str_replace('…', '/', $line);
				$binding = clearValue($line);

				if ($c == 'mwgt' || $c == 'mrv') {
					$binding = explode('/', $binding)[1];
				}

				$bindings[$c] = $binding;
				$gotCharacteristics[] = $c;

				unset($characterLines[$i]);
			}
		}
	}

	$keys = array_keys($characteristics);
	for ($i = 0; $i < count($characteristics); $i++) {
		if (!in_array($keys[$i], $gotCharacteristics)) {
			$bindings[$i] = 0;
		}
	}

	$bindings[] = $name;
	$sql .= ' WHERE `name` = ?';

	//echo $sql;
	//print_r($bindings);
	// exit();

	$db->execute($sql, array_values($bindings));
}
} catch (Exception $e) {
	echo $sql;
	echo $e->getMessage();
	print_r($bindings);
}

$timeEnd = (microtime(true) - $timeStart);
echo "<p>Execution time: $timeEnd</p>";

libxml_clear_errors();

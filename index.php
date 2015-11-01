<?php
$time = filemtime('index.php');
echo '<small class="text-muted">Pagina is voor het laasts bijgewerkt:  <br/>'.timeDiffirence($time).' geleden.</small>';
function timeDiffirence ($time){
	$time = time() - $time;
	$time = ($time<1)? 1 : $time;
	$tokens = [
		31536000 => [
				1 => 'jaar',
				2 => 'jaren',
			],
		2592000 => [
				1 => 'maand',
				2 => 'maanden',
			],
		604800 => [
				1 => 'week',
				2 => 'weken',
			],
		86400 => [
				1 => 'dag',
				2 => 'dagen',
			],
		3600 => [
				1 => 'uur',
				2 => 'uren',
			],
		60 => [
				1 => 'minuut',
				2 => 'minuten',
			],
		1 => [
				1 => 'seconde',
				2 => 'seconden',
			],
	];
	foreach($tokens as $unit => $text){
		if($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		if($numberOfUnits == 1) $textUnit = 1;
		if($numberOfUnits > 1) $textUnit = 2;
		$return = $numberOfUnits.' '.$text[$textUnit];
		return $return;
	}
}
?>

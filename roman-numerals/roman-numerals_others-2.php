<?php

function toRoman($number)
{
	$romanMap = array(
    	'IIIII' => 'V',
    	'VV' => 'X',
    	'XXXXX' => 'L',
    	'LL' => 'C',
    	'CCCCC' => 'D',
    	'DD' => 'M',

    	'IIII' => 'IV',
    	'CCCC' => 'CD',
    	'XXXX' => 'XL',

    	'VIV' => 'IX',
    	'LXL' => 'XC',
    	'DCD' => 'CM'    	
    	);

	$roman = str_repeat("I", $number);
    $roman = str_replace(array_keys($romanMap), array_values($romanMap), $roman);

	return $roman;
}
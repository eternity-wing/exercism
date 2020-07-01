<?php

echo isIsogram('Heizölrückstoßabdämpfung');

function isIsogram(string $str): bool {
    $str = sanitize($str);
    $characterMap = [];

    $isIsogram = true;
    for($i = 0, $iMax = strlen($str); $i < $iMax; $i++){
        $character = ord($str[$i]);

        if(isset($characterMap[$character])){
            $isIsogram = false;
            break;
        }
        $characterMap[$character] = $str[$i];
    }
    return $isIsogram;
}


function sanitize(string $str): string {
    $str =  str_replace([' ', '-'], '', $str);
    return utf8_decode(strtolower($str));
}
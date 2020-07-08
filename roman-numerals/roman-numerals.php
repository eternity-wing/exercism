<?php

const ROMANIAN_SYMBOLS = ["I","IV","V","IX","X","XL","L","XC","C","CD","D","CM","M"];
const ROMANIAN_SYMBOLS_CORRESPONDING_NUMBER = [1,4,5,9,10,40,50,90,100,400,500,900,1000];

function toRoman(Int $number):String
{
    $romanianNumber = '';

    $placeValueIndex = count(ROMANIAN_SYMBOLS_CORRESPONDING_NUMBER) - 1;
    
    while ($number>0) {
        $digit = (int) ($number / ROMANIAN_SYMBOLS_CORRESPONDING_NUMBER[$placeValueIndex]);
        $number = (int)($number % ROMANIAN_SYMBOLS_CORRESPONDING_NUMBER[$placeValueIndex]);
        $romanianNumber .= str_repeat(ROMANIAN_SYMBOLS[$placeValueIndex], $digit);
        $placeValueIndex--;
    }

    return $romanianNumber;
}

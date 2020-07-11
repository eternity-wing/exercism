<?php

const FORWARD = 1;
const BACKWARD = -1;

function isPalindromic(int $number){
    return $number === (int) strrev($number);
}

function getDivisorInRange(int $number, int $start, int $end): ?array{
    $divisors = [];

    for($divisor = $start ; ($divisor <= $end && $divisor <= ceil(($number / 2))) ; $divisor++){
        $quotient = $number / $divisor;
        if(($quotient > $end || $quotient < $start) || ($number % $divisor !== 0)){
            continue;
        }
        $result = [$divisor, $quotient];
        sort($result);
        if(!in_array($result, $divisors, true)){
            $divisors[] = $result;
        }

    }
    return $divisors !== [] ? $divisors : null;
}



function smallest(int $startBoundary, int $endBoundary){
    return getFirstPalindromeProductsInRange($startBoundary, $endBoundary, FORWARD);
}

function largest(int $startBoundary, int $endBoundary){
    return getFirstPalindromeProductsInRange($startBoundary, $endBoundary, BACKWARD);
}

function getFirstPalindromeProductsInRange(int $startBoundary, int $endBoundary, int $direction){
    $start = $direction === FORWARD ? $startBoundary : $endBoundary;
    $startProduct = $start * $start;

    $i = 0;
    $range = ($endBoundary * $endBoundary) - ($startBoundary * $startBoundary);

    $palindrome = null;
    while($i <= $range && null === $palindrome){
        $product = $startProduct + ($i * $direction);
        if(isPalindromic($product) && ($divisors = getDivisorInRange($product, $startBoundary, $endBoundary))){
            return [$product, $divisors];
        }
        $i++;
    }

    throw new \RuntimeException('');
}


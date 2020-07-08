<?php
const MIN_ALLOWED_LENGTH = 2;


function isValid(string $cardNumber)
{
    $cardNumber = trimCardNumber($cardNumber);
    return isCardLengthAllowed($cardNumber) && isNumeric($cardNumber) && isFollowLuhnPattern($cardNumber);
}

function trimCardNumber(string $cardNumber): string
{
    return preg_replace('/\s+/', '', $cardNumber);
}

function isCardLengthAllowed(string $cardNumber): bool
{
    return strlen($cardNumber) >= MIN_ALLOWED_LENGTH;
}

function isNumeric(string $cardNumber): bool
{
    return ctype_digit($cardNumber);
}

function isFollowLuhnPattern(string $cardNumber)
{
    $sum = 0;
    $isEvenIndex = false;
    for ($i = strlen($cardNumber) - 1 ; $i >= 0 ; $i--) {
        $numb = (int)$cardNumber[$i];
        if ($isEvenIndex && $numb !== 9) {
            $numb = ($numb * 2) % 9;
        }
        $sum += $numb;
        $isEvenIndex = !$isEvenIndex;
    }
    return $sum % 10 === 0;
}

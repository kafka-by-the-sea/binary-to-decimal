<?php

require_once 'vendor/autoload.php';

/*
100110101
1 x 2^8 + 0 x 2^7 + 0 x 2^6 + 1 * 2^5 + 1 * 2^4 + 0 * 2^3 + 1 * 2^2 + 0 * 2^1 + 1 * 2^0
*/

//寫法一
/*
function binaryToDecimal($binary)
{
    $total = 0;
    $exponent = strlen($binary) - 1;
    for ($i = 0; $i < strlen($binary); $i++) {
        $decimal = $binary[$i] * (2 ** $exponent);
        $total += $decimal;
        $exponent--;
    }
    return $total;
}
*/

//echo binaryToDecimal("100110101");

//寫法二
//跑程式時要注意要把其中一個fun註解掉，不然會撞名
function binaryToDecimal($binary)
{
    return collect(str_split($binary))
        ->reverse()
        ->values()
        ->map(function ($column, $exponent) {
            return $column * (2 ** $exponent);
        })->sum();
}

//echo binaryToDecimal("100110101");
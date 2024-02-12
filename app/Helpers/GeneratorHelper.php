<?php

namespace App\Helpers;

function generateRandomNameWords()
{
    $nameWords = [
        'apple',
        'banana',
        'lemon',
        'lime',
        'fig',
        'pomegranate',
        'raspberry',
        'oblivion',
        'phoenix',
        'javascript',
        'oop',
        'glow',
        'zest',
        'yearning',
        'radiance',
        'moonbeam',
        'outsourced',
        'company',
        'coding',
        'programming',
        'ultima',
        'gaming',
        'willow',
        'avalanche',
        'crimson',
        'inferno',
        'heaven',
        'monkey',
        'zootopia'
    ];

    $randomWords = array_rand($nameWords, 2);

    $randomWord1 = $nameWords[$randomWords[0]];
    $randomWord2 = $nameWords[$randomWords[1]];

    return $randomWord1 . ' ' . $randomWord2;
}

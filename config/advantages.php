<?php

return [
    'cashback' => [
        'min_transaction_amounts' => [
            'start' => 35,
            'smart' => 25,
            'premium' => 20,
        ],
        'grade_0' => [
            'start' => 0.5,
            'smart' => 2.5,
            'premium' => 4,
        ],
        'grade_1' => [
            'start' => 1,
            'smart' => 3,
            'premium' => 4.5,
        ],
        'grade_2' => [
            'smart' => 4,
            'premium' => 5.5,
        ],
        'grade_3' => [
            'premium' => 7,
        ],
    ],
    'rendement' => [
        'grade_0' => [
            'start' => 1,
            'smart' => 1.5,
            'premium' => 2,
        ],
        'grade_1' => [
            'start' => 1.1,
            'smart' => 1.65,
            'premium' => 2.2,
        ],
        'grade_2' => [
            'smart' => 1.8,
            'premium' => 2.4,
        ],
        'grade_3' => [
            'premium' => 2.8,
        ],
    ],
];

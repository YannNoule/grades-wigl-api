<?php

return [
    'all_grades' => [
        '0' => [
            'description' => 'Grade 0',
        ],
        '1' => [
            'description' => 'Grade 1'],

        '2' => [
            'description' => 'Grade 2',
        ],
        '3' => [
            'description' => 'Grade 3',
        ],
    ],
    'thresholds' => [
        '1' => 5000,
        '2' => 10000,
        '3' => 20000,
    ],
    'plans' => [
        'start' => [
            'eligible_for' => ['1'],
        ],
        'smart' => [
            'eligible_for' => ['1', '2'],
        ],
        'premium' => [
            'eligible_for' => ['1', '2', '3'],
        ],
    ],
];

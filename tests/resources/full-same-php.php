<?php return [
    'string' => 'Anyone\'s name, really.',
    'int' => 13,
    'badHex' => 'f0xf3',
    'hex' => 0,
    'trueType' => true,
    'falseType' => false,
    'zero' => 0,
    'nullType' => NULL,
    'notNull' => 'null',
    'notTrue' => 'y',
    'notBoolTrue' => 'true',
    'notInt' => '5',
    'float' => 5.3399999999999999,
    'negative' => -90,
    'smallFloat' => 0.69999999999999996,
    'newLine' => '
',
    'imports' => [
        'files' => [
            'custom-php.php'
        ]
    ],
    'first' => [
        'keyOne' => 'value one',
        'keyTwo' => 'value two',
        'keyThree' => 'value three',
        'keyFour' => 'value four',
        'innerOne' => [
            'keyFive' => 'value five',
            'keySix' => 'value six',
            'innerTwo' => [
                'innerThree' => [
                    'keySeven' => 'value seven'
                ]
            ]
        ]
    ],
    'database' => [
        'default' => [
            'host' => '192.168.1.101',
            'port' => 3306,
            'name' => 'default_database',
            'user' => 'root',
            'pass' => '2f,.-0"34512\''
        ],
        'bkp1' => [
            'host' => '192.168.1.111',
            'port' => 3306,
            'name' => 'bkp_1_database',
            'user' => 'bkp_1',
            'pass' => '566&2n3\'-&5dnA'
        ],
        'bkp2' => [
            'host' => '192.168.1.112',
            'port' => 3306,
            'name' => 'bkp_2_database',
            'user' => 'bkp_2',
            'pass' => '56"45H^e-&5dnA'
        ]
    ]
];

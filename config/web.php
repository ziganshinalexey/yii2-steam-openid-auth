<?php

declare(strict_types = 1);

return [
    'components' => [
        'steamApi'             => require __DIR__ . '/steamapi.component.global.php',
        'authClientCollection' => require __DIR__ . '/authclientcollection.component.global.php',
    ],
];

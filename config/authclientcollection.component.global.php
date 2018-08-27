<?php

declare(strict_types = 1);

use yii\authclient\Collection;
use Ziganshinalexey\Yii2SteamOpenIdAuth\models\SteamOpenId;

return [
    'class'   => Collection::class,
    'clients' => [
        'steam' => [
            'class' => SteamOpenId::class,
        ],
    ],
];

<?php

declare(strict_types = 1);

use Userstory\ComponentBase\interfaces\ComponentWithFactoryInterface;
use yii\httpclient\Client;
use Ziganshinalexey\Yii2SteamOpenIdAuth\components\SteamApiComponent;
use Ziganshinalexey\Yii2SteamOpenIdAuth\factories\SteamApiFactory;

return [
    'class'                                           => SteamApiComponent::class,
    'apiKey'                                          => 'your key',
    ComponentWithFactoryInterface::FACTORY_CONFIG_KEY => [
        'class'           => SteamApiFactory::class,
        'modelConfigList' => [
            SteamApiFactory::HTTP_CLIENT => [
                'type' => [
                    'class'         => Client::class,
                    'requestConfig' => [
                        'method' => 'GET',
                    ],
                ],
            ],
        ],
    ],

];

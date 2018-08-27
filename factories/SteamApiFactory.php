<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\factories;

use Userstory\ComponentBase\models\ModelsFactory;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;

/**
 * Фабрика. Реализует породждение моделей пакета для работы с сущностью "Клиент".
 */
class SteamApiFactory extends ModelsFactory
{
    public const HTTP_CLIENT = 'httpClient';

    /**
     * Метод возвращает клиент для HTTP-запросов.
     *
     * @throws InvalidConfigException Исключение генерируется в случае проблем при создании объекта-модели.
     *
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->getModelInstance(self::HTTP_CLIENT, [], false);
    }
}

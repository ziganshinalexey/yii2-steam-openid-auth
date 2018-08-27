<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\models;

use yii\authclient\OpenId;

/**
 * Класс расширяет базовый для работы с авторизацией стима.
 */
class SteamOpenId extends OpenId
{
    /**
     * Урл авторизации.
     *
     * @var string
     */
    public $authUrl = 'http://steamcommunity.com/openid';

    /**
     * Параметры отображения модалки.
     *
     * @return array
     */
    protected function defaultViewOptions(): array
    {
        return [
            'popupWidth'  => 880,
            'popupHeight' => 520,
        ];
    }

    /**
     * Метод возвращает имя сервиса.
     *
     * @return string
     */
    protected function defaultName(): string
    {
        return 'steam';
    }

    /**
     * Метод возвращает заголовок сервиса.
     *
     * @return string
     */
    protected function defaultTitle(): string
    {
        return 'Steam';
    }
}

<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\actions;

use yii\authclient\AuthAction;
use yii\base\InvalidConfigException;
use yii\base\NotSupportedException;
use yii\web\Response;
use Ziganshinalexey\Yii2SteamOpenIdAuth\traits\AuthClientComponentTrait;

/**
 * Класс расширяет базовый для работы с авторизацией стима.
 */
class SteamAuthAction extends AuthAction
{
    use AuthClientComponentTrait;

    /**
     * Переопределенный метод исполнения действия.
     *
     * @return Response
     *
     * @throws InvalidConfigException Если компонент не подключен.
     * @throws NotSupportedException Если не поддерживается клиент.
     */
    public function run(): Response
    {
        return $this->auth($this->getAuthClientComponent()->getClient('steam'));
    }
}

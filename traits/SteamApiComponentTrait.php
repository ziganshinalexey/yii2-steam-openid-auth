<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\traits;

use yii;
use yii\base\InvalidConfigException;
use Ziganshinalexey\Yii2SteamOpenIdAuth\components\SteamApiComponent;

/**
 * Трейт, содержащий логику доступа к компоненту.
 */
trait SteamApiComponentTrait
{
    /**
     * Экземпляр объекта компонента.
     *
     * @var SteamApiComponent|null
     */
    protected $steamApiComponent;

    /**
     * Метод возвращает объект компонента.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return SteamApiComponent
     */
    public function getSteamApiComponent(): SteamApiComponent
    {
        if (! $this->steamApiComponent) {
            $this->steamApiComponent = Yii::$app->get('steamApi');
        }
        return $this->steamApiComponent;
    }
}

<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\traits;

use yii;
use yii\authclient\Collection;
use yii\base\InvalidConfigException;

/**
 * Трейт, содержащий логику доступа к компоненту.
 */
trait AuthClientComponentTrait
{
    /**
     * Экземпляр объекта компонента.
     *
     * @var Collection|null
     */
    protected $authActionComponent;

    /**
     * Метод возвращает объект компонента.
     *
     * @throws InvalidConfigException Если компонент не зарегистрирован.
     *
     * @return Collection
     */
    public function getAuthClientComponent(): Collection
    {
        if (! $this->authActionComponent) {
            $this->authActionComponent = Yii::$app->get('authClientCollection');
        }
        return $this->authActionComponent;
    }
}

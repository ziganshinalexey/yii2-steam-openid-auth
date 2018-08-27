<?php

declare(strict_types = 1);

namespace Ziganshinalexey\Yii2SteamOpenIdAuth\components;

use Userstory\ComponentBase\interfaces\ComponentWithFactoryInterface;
use Userstory\ComponentBase\traits\ModelsFactoryTrait;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\httpclient\Response;
use Ziganshinalexey\Yii2SteamOpenIdAuth\factories\SteamApiFactory;
use function get_class;

/**
 * Компонент. Является программным API для доступа к пакету.
 */
class SteamApiComponent extends Component implements ComponentWithFactoryInterface
{
    use ModelsFactoryTrait {
        ModelsFactoryTrait::getModelFactory as getModelFactoryFromTrait;
    }

    /**
     * Свойство содержит секретный ключ для работы апи.
     *
     * @var string|null
     */
    protected $apiKey;

    /**
     * Метод задает значение секретный ключ для работы апи.
     *
     * @param string $value Новое значение.
     *
     * @return SteamApiComponent
     */
    public function setApiKey(string $value): self
    {
        $this->apiKey = $value;
        return $this;
    }

    /**
     * Метод возвращает секретный ключ для работы апи.
     *
     * @return string
     *
     * @throws InvalidConfigException Если ключ не задан.
     */
    protected function getApiKey(): string
    {
        if (null === $this->apiKey) {
            throw new InvalidConfigException(__METHOD__ . '() Секретный ключ апи не задан.');
        }
        return $this->apiKey;
    }

    /**
     * Метод возвращает фабрику моделей пакета "Адрес".
     *
     * @throws InvalidConfigException Генерируется если фабрика не имплементирует нужный интерфейс.
     *
     * @return SteamApiFactory
     */
    public function getModelFactory(): SteamApiFactory
    {
        $modelFactory = $this->getModelFactoryFromTrait();
        if (! $modelFactory instanceof SteamApiFactory) {
            throw new InvalidConfigException('Class ' . get_class($modelFactory) . ' must implement interface ' . SteamApiFactory::class);
        }
        return $modelFactory;
    }

    /**
     * Метод возвращает данные пользователя.
     *
     * @param string $profileId Идентификатор пользователя.
     *
     * @return array
     *
     * @throws InvalidConfigException Если фабрика сгенерирована криво.
     */
    public function getProfile(string $profileId): array
    {
        $client = $this->getModelFactory()->getHttpClient();
        /* @var Response $response */
        $response = $client->createRequest()->setUrl('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/')->setData([
            'key'      => $this->getApiKey(),
            'steamids' => $profileId,
            'format'   => 'json',
        ])->send();

        if (! $response->getIsOk() || ! isset($response->getData()['response']['players'][0])) {
            throw new InvalidConfigException('Bad steam response.');
        }

        return $response->getData()['response']['players'][0];
    }
}

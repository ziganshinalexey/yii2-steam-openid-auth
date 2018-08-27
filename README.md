# Ziganshin Alexey / Yii2 Steam OpenId Auth

Пакет является расширенияем для `yiisoft/yii2-authclient` и добавляет готовые классы для работы с авторизацией со Steam через OpenId.
Пакет являетя продукцией компании Userstory.
Не все пакеты, которые используются указаны в зависимостях. Возможно это поправится и они станут публичными.

### Использование

Controller:
```php
class SiteController extends Controller
{
    use SteamApiComponentTrait;
    
    . . .
    
    /**
     * Метод определяет конфигурацию экшенов текущего контроллера.
     *
     * @return array
     */
    public function actions()
    {
        return [
            . . .
            'auth'  => [
                'class'           => SteamAuthAction::class,
                'successCallback' => [
                    $this,
                    'auth',
                ],
            ],
        ];
    }
    
    /**
     * Метод обработки успешной авторизации.
     *
     * @param SteamOpenId $openIdClient Клиент авторизации.
     *
     * @return void
     *
     * @throws InvalidConfigException Если стим гонит.
     */
    public function auth(SteamOpenId $openIdClient): void
    {
        // Your action handle. For example:
        if (! isset($openIdClient->getUserAttributes()['id'])) {
            throw new InvalidConfigException('Bad steam response.');
        }
        $openIdUrl   = explode('/', $openIdClient->getUserAttributes()['id']);
        $profileId   = array_pop($openIdUrl);
        $profileData = $this->getSteamApiComponent()->getProfile($profileId);
        var_dump($profileData);
        die;
    }
    
    . . .
    
}
```

View:
```php
use yii\authclient\widgets\AuthChoice;

/* @var $this yii\web\View */

try {
    AuthChoice::widget([
        'baseAuthUrl' => ['site/auth'],
        'popupMode'   => false,
    ]);
} catch (Exception $e) {
    // Your Catch handle.
}
```

Так же пакет предоставляет функционал работы с апи Steam:

Пока реализован метод получения профиля пользователя.

Class:

```php
$profileData = $this->getSteamApiComponent()->getProfile($profileId);
```

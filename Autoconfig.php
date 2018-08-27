<?php

namespace Ziganshinalexey\Yii2SteamOpenIdAuth;

use Userstory\ComponentAutoconfig\interfaces\console\AutoconfigInterface as AutoconfigConsoleInterface;
use Userstory\ComponentAutoconfig\interfaces\web\AutoconfigInterface as AutoconfigWebInterface;

/**
 * Автоконфиг для стандартных компонентов.
 *
 * @package Userstory\I18n
 */
class Autoconfig implements AutoconfigWebInterface, AutoconfigConsoleInterface
{
    /**
     * Метод реализует класс интерфейса getWebConfig.
     *
     * @return array
     */
    public static function getWebConfig()
    {
        return require __DIR__ . '/config/web.php';
    }

    /**
     * Метод реализует класс интерфейса getConsoleConfig.
     *
     * @return array
     */
    public static function getConsoleConfig()
    {
        return require __DIR__ . '/config/console.php';
    }
}

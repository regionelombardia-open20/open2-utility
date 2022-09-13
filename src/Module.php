<?php

namespace open20\amos\utility;

use Yii;
use open20\amos\core\module\AmosModule;
use yii\helpers\Url;

/**
 * /**
 * due module definition class
 */
class Module extends AmosModule
{
    public function getWidgetIcons()
    {
        return [
        ];
    }

    public function getWidgetGraphics()
    {
        return [
        ];
    }

    public static function getModuleName()
    {
        return \Yii::$app->getModule(static::getModuleName());
    }

    /**
     * Get default models
     * @return array
     */
    protected function getDefaultModels()
    {
        return [
        ];
    }
}
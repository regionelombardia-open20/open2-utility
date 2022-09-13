<?php

namespace open20\amos\utility\assets;

use yii\web\AssetBundle;

class SiPackagesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/open20/amos-utility/src/assets/web';
	
    /**
     * @inheritdoc
     */
    public $css = [
    ];
	
    /**
     * @inheritdoc
     */
    public $js = [
        'js/d3.min.js',
        'js/d3.dependencyWheel.js',
        'js/composerBuilder.js',
    ];
	
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];
}
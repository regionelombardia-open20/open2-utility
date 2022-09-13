<?php
/**
 * User: damian.gomez
 */
namespace open20\amos\utility\controllers;

use yii\web\Controller;
use Yii;

class PackagesController extends Controller
{
    public $layout = "@vendor/open20/amos-core/views/layouts/main";

    public function actionIndex() {
        $basepath =  \Yii::$app->getBasePath().DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;

        $composerLock = file_get_contents($basepath . 'composer.lock');
        $composerJson = file_get_contents($basepath . 'composer.json');

        return $this->render('index', [
            'composerLock' => $composerLock,
            'composerJson' => $composerJson
        ]);
    }
}
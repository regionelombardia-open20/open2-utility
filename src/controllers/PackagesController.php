<?php
namespace open20\amos\utility\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

class PackagesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'requirements'
                        ],
                        'roles' => ['ADMIN']
                    ],
                ],
            ],
        ];
    }

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

    public function actionRequirements() {
        require(__DIR__ . '/../../../../yiisoft/yii2/requirements/YiiRequirementChecker.php');

        $requirementsChecker = new \YiiRequirementChecker();
        return $requirementsChecker->checkYii()->render();
    }
}
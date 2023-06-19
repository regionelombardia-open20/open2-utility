<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\utility
 * @category   CategoryName
 */

namespace open20\amos\utility\widgets\icons;

use open20\amos\core\widget\WidgetIcon;
use open20\amos\dashboard\models\AmosWidgets;
use open20\amos\utility\Module;
use yii\helpers\ArrayHelper;
use open20\amos\notificationmanager\base\NotifierRepository;
use Yii;

/**
 * Class WidgetIconPackages
 * @package open20\amos\utility\widgets\icons
 */
class WidgetIconPackages extends WidgetIcon
{
    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        $options = parent::getOptions();

        // Aggiunge all'oggetto container tutti i widgets recuperati dal controller del modulo
        return ArrayHelper::merge($options, ["children" => $this->getWidgetsIcon()]);
    }

    public function getWidgetsIcon()
    {
        return AmosWidgets::find()
            ->andWhere([
                'child_of' => self::className()
            ])->all();
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setLabel(Module::tHtml('utility', 'Packages'));
        $this->setDescription(Module::t('utility', 'See installed packages'));

        $this->setIcon('list');
        //$this->setIconFramework();

        $this->setUrl(['/utility/packages']);

        $this->setCode('utility');
        $this->setModuleName('utility');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(ArrayHelper::merge($this->getClassSpan(), [
            'bk-backgroundIcon',
            'color-primary'
        ]));
    }
}

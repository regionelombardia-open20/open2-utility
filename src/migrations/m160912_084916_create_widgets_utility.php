<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\utility
 * @category   CategoryName
 */

use yii\db\Migration;
use open20\amos\dashboard\models\AmosWidgets;

class m160912_084916_create_widgets_utility extends Migration
{
    const MODULE_NAME = 'utility';
    private $widgets;
    
    private function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \open20\amos\utility\widgets\icons\WidgetIconPackages::className(),
                'type' => AmosWidgets::TYPE_ICON,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_ENABLED,
            ],
        ];
    }
    
    public function safeUp()
    {
        $this->initWidgetsConfs();
        
        foreach ( $this->widgets as $singleWidget )
        {
            $this->insertNewWidget( $singleWidget );
        }
    
        return true;
    }
    
    /**
     * Metodo privato per l'inserimento della configurazione per un nuovo widget.
     *
     * @param array $newWidget    Array chiave => valore contenente i dati da inserire nella tabella.
     */
    private function insertNewWidget( $newWidget )
    {
        if ( $this->checkWidgetExist( $newWidget['classname'] ) )
        {
            echo "Widget utility ".$newWidget['classname']." esistente. Skippo...\n";
        }
        else
        {
            $this->insert( AmosWidgets::tableName(), $newWidget );
            echo "Widget utility ".$newWidget['classname']." creato.\n";
        }
    }
    
    private function checkWidgetExist( $classname )
    {
        $sql = "SELECT COUNT(classname) FROM ".AmosWidgets::tableName()." WHERE classname LIKE '".addslashes(addslashes($classname))."'";
        $cmd = $this->db->createCommand();
        $cmd->setSql( $sql );
        $oldWidgets = $cmd->queryScalar();
        return ( $oldWidgets > 0 );
    }
    
    public function safeDown()
    {
        $this->initWidgetsConfs();
        $this->execute("SET foreign_key_checks = 0;");
        foreach ( $this->widgets as $singleWidget )
        {
            $where = " classname LIKE '".addslashes(addslashes($singleWidget['classname']))."'";
            $this->delete( AmosWidgets::tableName(), $where );
        }
        $this->execute("SET foreign_key_checks = 1;");
        
        return true;
    }
}

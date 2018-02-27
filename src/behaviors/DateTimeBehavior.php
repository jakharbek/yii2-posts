<?php
namespace jakharbek\posts\behaviors;

/**
 *
 * @author Jakhar <javhar_work@mail.ru>
 *
 */

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;


class DateTimeBehavior extends AttributeBehavior
{
    public $attribute;
    public $format = 'd-m-Y H:i:s';
    public $disableScenarios = null;


    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'visibleDate',
            ActiveRecord::EVENT_BEFORE_VALIDATE  => 'dbDate',
        ];
    }

    public function visibleDate()
    {
        if(in_array($this->owner->scenario,$this->disableScenarios)){return $this->owner->{$this->attribute};}
        $this->owner->{$this->attribute} = Yii::$app->formatter->asDate($this->owner->{$this->attribute},$this->format);
    }

    public function dbDate()
    {
        if(in_array($this->owner->scenario,$this->disableScenarios)){return $this->owner->{$this->attribute};}
        $this->owner->{$this->attribute} = strtotime($this->owner->{$this->attribute});
    }
}
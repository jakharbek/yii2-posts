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


class UserBehavior extends AttributeBehavior
{
    public $attribute = "user_id";
    public $user_id = "user_id";


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT  => 'user',
        ];
    }

    public function user(){
        if(strlen($this->owner->{$this->attribute}) == 0):
            $this->owner->{$this->attribute} = Yii::$app->user->getIdentity()->{$this->user_id};
        endif;
    }
}
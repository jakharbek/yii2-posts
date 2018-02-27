<?php

namespace jakharbek\posts\models;

use Yii;
use jakharbek\posts\models\Posts;
/**
 * This is the ActiveQuery class for [[Posts]].
 *
 * @see Posts
 */
class PostsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Posts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Posts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function statuses($status = null){
        if($status == Posts::STATUS_ACTIVE):
            return Yii::t('jakhar-posts','Active');
        else:
            return Yii::t('jakhar-posts','Deactive');
        endif;
    }
}

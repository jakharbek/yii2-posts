<?php

use yii\helpers\Html;
use jakharbek\langs\widgets\LangsWidgets;

/* @var $this yii\web\View */
/* @var $model jakharbek\posts\models\Posts */

$this->title = Yii::t('jakhar-posts','Updating Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('jakhar-posts','Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->post_id]];
$this->params['breadcrumbs'][] = Yii::t('jakhar-posts','Updating');
?>
<?php  echo LangsWidgets::widget(['model_db' => $model,'create_url' => '/posts/posts/create/']); ?>
<div class="posts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use jakharbek\langs\widgets\LangsWidgets;

/* @var $this yii\web\View */
/* @var $model jakharbek\posts\models\Posts */

$this->title = Yii::t('jakhar-posts','Creating Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('jakhar-posts','Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  echo LangsWidgets::widget(); ?>
<div class="posts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

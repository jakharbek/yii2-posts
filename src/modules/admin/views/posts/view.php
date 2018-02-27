<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model jakharbek\posts\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('jakhar-posts','Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-view">

    <p>
        <?= Html::a(Yii::t('jakhar-posts','Update'), ['update', 'id' => $model->post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('jakhar-posts','Delete'), ['delete', 'id' => $model->post_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('jakhar-posts','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'post_id',
            'title',
            'subtitle',
            'description:ntext',
            'content:ntext',
            'slug',
            'sort',
            'date_update',
            'date_create',
            'date_publish',
            'status',
            'lang_hash',
            'lang',
            'user_id',
        ],
    ]) ?>

</div>

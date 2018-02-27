<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'post_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'subtitle') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_publish') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'lang_hash') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('jakhar-posts','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('jakhar-posts','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

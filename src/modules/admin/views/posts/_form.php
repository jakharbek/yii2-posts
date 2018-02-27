<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\editable\Editable;
use kartik\daterange\DateRangePicker;
use kartik\switchinput\SwitchInput;
use dosamigos\selectize\SelectizeDropDownList;
use yii\web\JsExpression;
use jakharbek\categories\models\Categories;

/* @var $this yii\web\View */
/* @var $model jakharbek\posts\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="col-md-7">

    <div class="posts-form">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class' => 'form-control title-generate']) ?>

        <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]) ?>
        <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full'
        ]) ?>

        <?php
        $addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;
      ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
<div class="col-lg-5">

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true,'class' => 'form-control slug-generate']) ?>

    <div class="row">
        <div class="col-lg-7 col-md-7">
            <?php
            // Usage with ActiveForm and model
            echo $form->field($model, 'status')->widget(SwitchInput::classname(), [
                'type' => SwitchInput::CHECKBOX,
                'pluginOptions'=>[
                    'onText'=> Yii::t('jakhar-posts','Active'),
                    'offText'=> Yii::t('jakhar-posts','Deactive')
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-5 col-md-5">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label" for="posts-sort"><?=$model->getAttributeLabel('date_publish')?></label>

        <?php
        echo '<div class="input-group drp-container">';
        echo DateRangePicker::widget([
                'model' => $model,
                'attribute'=>'date_publish',
                'useWithAddon'=>true,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'locale'=>['format' => 'd.m.Y'],
                    'singleDatePicker'=>true,
                ]
            ]) . $addon;
        echo '</div>';
        ?>
    </div>
    <?php if(!$model->isNewRecord):?>
        <div class="form-group">
            <label class="control-label" for="posts-sort"><?=$model->getAttributeLabel('date_update')?></label>

            <?php
            echo '<div class="input-group drp-container">';
            echo DateRangePicker::widget([
                    'model' => $model,
                    'attribute'=>'date_update',
                    'useWithAddon'=>true,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'locale'=>['format' => 'd.m.Y'],
                        'singleDatePicker'=>true,
                    ]
                ]) . $addon;
            echo '</div>';
            ?>
        </div>
        <div class="form-group">
            <label class="control-label" for="posts-sort"><?=$model->getAttributeLabel('date_create')?></label>

            <?php
            echo '<div class="input-group drp-container">';
            echo DateRangePicker::widget([
                    'model' => $model,
                    'attribute'=>'date_create',
                    'useWithAddon'=>true,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'locale'=>['format' => 'd.m.Y'],
                        'singleDatePicker'=>true,
                    ]
                ]) . $addon;
            echo '</div>';
            ?>
        </div>
    <?php endif;?>
    <?php
    echo SelectizeDropDownList::widget([
        'name' => 'tags',
        'items' => ['love', 'this', 'game'],
        'clientOptions' => [
            'maxItems' => 3
        ],
    ]);
    ?>

    <?php
    echo jakharbek\categories\widgets\CategoriesWidget::widget(['selected' => $model->categoriesSelected(),'model_db' => $model,'name' => 'Posts[categoriesform]']);
    ?>
</div>
<?php ActiveForm::end(); ?>
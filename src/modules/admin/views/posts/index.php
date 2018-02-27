<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use jakharbek\langs\widgets\LangsWidgets;
use kartik\daterange\DateRangePicker;
use kartik\switchinput\SwitchInput;
use jakharbek\users\models\Users;
use jakharbek\posts\models\Posts;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('jakhar-posts','Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  echo LangsWidgets::widget(); ?>
<div class="posts-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('jakhar-posts','Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            //'date_update',
            [
                    'attribute' => 'date_create',
                    'filter' =>  DateRangePicker::widget([
                                                            'model'=>$searchModel,
                                                            'attribute' => 'date_create',
                                                            'convertFormat'=>true,
                                                            'pluginOptions'=>[
                                                                'locale'=>['format' => 'd.m.Y'],
                                                            ]
                                                        ])
            ],
            [
                'attribute' => 'date_publish',
                'filter' =>  DateRangePicker::widget([
                    'model'=>$searchModel,
                    'attribute' => 'date_publish',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'locale'=>['format' => 'd.m.Y'],
                    ]
                ])
            ],
            [
                    'attribute'=>'status',
                    'filter' => SwitchInput::widget([
                         'model' => $searchModel,
                        'attribute' => 'status',
                        "pluginEvents" => ["switchChange.bootstrapSwitch" => "function() { console.log($(this).closest('.form-control').click()); }"],
                        'pluginOptions' => [
                            'onText' => Yii::t('jakhar-posts','Active'),
                            'offText' => Yii::t('jakhar-posts','Deactive'),
                        ],
                    ]),
                    'content' => function($data){
                        return Posts::find()->statuses($data->status);
                    }
            ],
            //'lang_hash',
            //'lang',
            [
                    'attribute' => 'user_id',
                    'filter' => ArrayHelper::map(Users::find()->active()->all(),'user_id','login'),
                    'content' => function($data){
                        return Users::findOne($data->user_id)->login;
                    }
            ],
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

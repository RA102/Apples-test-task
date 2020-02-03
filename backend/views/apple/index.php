<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apples';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apple', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'color',
            'created_at' => [
                'label' => 'Создано',
                'format' => 'time',
                'value' => function ($data) {
                    return $data->created_at;
                }
            ],
            'updated_at' => [
                    'label' => 'Упало',
                'format' => 'time',
                'value' => function($data) {
        return $data->updated_at;
                }

            ],
            'status',
            'how_much_eat',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="btn-group">{fall}{eat}{delete}',
                'buttons' => [
                    'fall' => function ($url, $model, $key) {
                        return Html::a('', ['apple/fall/', 'id' => $model->id], ['class' => 'glyphicon glyphicon-arrow-down']);
                    },
                    'eat' => function ($url, $model, $key) {
                        return Html::a('', ['apple/eat', 'id' => $model->id], ['class' => 'glyphicon glyphicon-adjust']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>

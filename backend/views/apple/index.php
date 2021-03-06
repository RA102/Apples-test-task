<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

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
        'filterPosition' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'color' => [
                'contentOptions' => [
                    'style' => 'width: 100px;',
                ],
                'label' => 'Цвет',
                'value' => function ($data) {
                    return $data->color;
                }
            ],
            'created_at' => [
                'contentOptions' => [
                    'style' => 'width: 150px;',
                ],
                'label' => 'Создано',
                'format' => 'time',
                'value' => function ($data) {
                    return $data->created_at;
                }
            ],
            'updated_at' => [
                'label' => 'Упало',

                'format' => 'time',
                'value' => function ($data) {
                    return $data->updated_at;
                }

            ],
            'point_no_return' => [
                'label' => 'Точка не возврата',
                'format' => 'time',
                'value' => function ($data) {
                    return $data->point_no_return;
                }
            ],
            'status_id' => [
                'label' => 'Статус',
                'value' => function ($data) {
                    return $data->status->name;
                }
            ],
            'how_much_left' => [
                'contentOptions' => [
                    'style' => 'width: 200px',
                ],
                'label' => 'Осталось',
                'value' => function ($data) {
                    return $data->how_much_left;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<span class="mr-2">{fall}</span><span class="mr-2">{eat}</span>',
                'header' => 'Упасть',
                'contentOptions' => [ 'style' => 'width: 60px; text-align: center'],
                'buttons' => [
                    'fall' => function ($url, $model, $key) {
                        return Html::a('', ['apple/fall/', 'id' => $model->id], ['class' => 'glyphicon glyphicon-arrow-down']);
                    },
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<span class="">{eat}</span>',
                'header' => 'Откусить',
                'contentOptions' => [ 'style' => 'width: 60px; text-align: center'],
                'buttons' => [
                    'eat' => function ($url, $model, $key) {
                        return Html::a('', ['apple/eat', 'id' => $model->id], ['class' => 'glyphicon glyphicon-adjust eat-apple']);
                    },
                ],

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Удалить',
                'contentOptions' => [ 'style' => 'width: 60px; text-align: center'],
                'template' => '<span class="">{delete}</span>',

            ],
        ],
    ]); ?>
</div>
<!--модальное окно-->

    <div id="myModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Сколько съесть</h4>
                </div>
                <div class="modal-body">
                    <form id="modal-form" name="modal-form">
                        <input id="countEat" class="form-control" name="eat">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button id="send" type="button" class="btn btn-primary">Съесть</button>
                </div>
            </div><!-- /.модальное окно-Содержание -->
        </div><!-- /.модальное окно-диалог -->
    </div><!-- /.модальное окно -->

<?php
$js = <<<JS
$('.eat-apple').on('click', function(event) {
    event.preventDefault();
    let url = $(this).attr('href');
    $('#myModal').modal('show');
    $('#send').on('click', function() {
        let valueInput = $('#modal-form').serialize();
        $('#myModal').modal('hide');
        $.ajax({
            url: url,
            data: valueInput,
            success: function(data) {
                $('#myModal').modal('show');
                $('.modal-title').text(data);
                $('.modal-body').detach();
                $('#send').detach();
                $('.modal-backdrop').delay(300).fadeOut("fast");
            }
        }); 
    });
    
    
    
    
});
JS;
$this->registerJs($js);

?>
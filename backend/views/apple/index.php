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
                'value' => function ($data) {
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
                        return Html::a('', ['apple/eat', 'id' => $model->id], ['class' => 'glyphicon glyphicon-adjust eat-apple']);
                    },
                ],
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
        });
    });
    
});
JS;
$this->registerJs($js);

?>
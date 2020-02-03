<?php

namespace backend\controllers;

use Yii;
use backend\models\Apple;
use backend\models\AppleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppleController implements the CRUD actions for Apple model.
 */
class AppleController extends Controller
{

    public $arrayAppleColor =  ["green", "red", "yellow"];
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Apple models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Apple model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \Throwable
     */
    public function actionCreate()
    {
        $countApple = random_int(1, 10);
        for ($i = 0; $i <= $countApple; $i++) {
            $model = new Apple();
            $model->color = $this->arrayAppleColor[random_int(0, 2)];
            $model->status = Apple::APPLE_ON_TREE;
            $model->insert(false);
        }
        return $this->redirect('index');
    }

    /**
     * @param integer $id
     * @return mixed
     *
     */
    public function actionFall($id)
    {
        $model = Apple::findOne($id);
        $model->status = Apple::APPLE_ON_GROUND;
        $model->update();
        return $this->redirect('index');
    }

    /**
     * @param integer $id
     * @return mixed
     *
     */
    public function actionEat($id)
    {
        $model = Apple::findOne($id);
        return false;
    }

    /**
     * Deletes an existing Apple model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Apple model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apple the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apple::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

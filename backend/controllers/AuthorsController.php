<?php

namespace backend\controllers;

use Yii;
use common\models\Authors;
use yii\web\Controller;


class AuthorsController extends Controller
{
    public function actionIndex(){

        $authorsList = Authors::find()->all();

        return $this->render('index', [
            'authorsList' => $authorsList,
        ]);
    }

    public function actionCreate(){

        $model = new Authors();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Автор добавлен!');
            return $this->redirect('index.php?r=authors%2Findex');

        }

        return $this->render('create',[
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){

        $model = Authors::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Автор изменен!');
            return $this->redirect('index.php?r=authors%2Findex');

        }

        return $this->render('update',[
            'model' => $model,
        ]);

    }

    public function actionDelete($id){

        $model = Authors::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success','Автор удален!');
        return $this->redirect('index.php?r=authors%2Findex');

    }
}



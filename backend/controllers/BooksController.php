<?php


namespace backend\controllers;

use Yii;
use common\models\Books;
use common\models\Authors;
use yii\data\Pagination;
use yii\web\Controller;


class BooksController extends Controller
{
    public function actionIndex()
    {
        $query = Books::find();


        $page = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);
        $booksList = $query->orderBy('id')->offset($page->offset)->limit($page->limit)->all();

        return $this->render('index', [
            'booksList' => $booksList,
            'page' => $page,
        ]);

    }

    public function actionCreate(){

        $modelB = new Books();
        $modelA = Authors::getlist();

        if($modelB->load(Yii::$app->request->post()) && $modelB->save()){
            Yii::$app->session->setFlash('success','Книга добавлена!');
            return $this->redirect('index.php?r=books%2Findex');

        }

        return $this->render('create',[
            'modelB' => $modelB,
            'modelA' => $modelA,

        ]);
    }

    public function actionUpdate($id){

        $model = Books::findOne($id);
        $modelA = Authors::getlist();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Книга изменена!');
            return $this->redirect('index.php?r=books%2Findex');

        }

        return $this->render('update',[
            'model' => $model,
            'modelA' => $modelA,
        ]);

    }

    public function actionDelete($id){

        $model = Books::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success','Книга удалена!');
        return $this->redirect('index.php?r=books%2Findex');

    }
}



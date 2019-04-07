<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ShowController extends Controller
{
    public function actionAuthors()
    {
        $authorsList = Yii::$app->db->createCommand('select a.id,firstname, lastname, count(author_id)
from authors a left join books b on b.author_id=a.id group by a.id order by a.id')->queryAll();

        return $this->render('authors',[
            'authorsList' => $authorsList ,
        ]);
    }
    public function actionBooks()
    {
        $booksList = Yii::$app->db->createCommand('select b.id, b.name, concat(a.firstname, \' \', a.lastname)
from books b left join authors a on  b.author_id=a.id
group by b.id, a.lastname, a.firstname
order by b.id')->queryAll();

        return $this->render('books',[
            'booksList' => $booksList ,
        ]);
    }

}
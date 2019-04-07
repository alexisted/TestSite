<?php
namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Authors;
use common\models\Books;

class ShowController extends Controller
{
    public function actionAuthors()
    {
        $query = Yii::$app->db->createCommand('select a.id,firstname, lastname, count(author_id)
from authors a left join books b on b.author_id=a.id group by a.id order by a.id')->queryAll();

        $page = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => count($query) ,
        ]);

        $sql = 'select a.id,firstname, lastname, count(author_id)
from authors a left join books b on b.author_id=a.id group by a.id order by a.id offset :off limit :lim';
        $authorsList = Authors::findBySql($sql, [':off' =>$page->offset , ':lim' =>$page->limit ])->asArray()->all();

        return $this->render('authors',[
            'authorsList' => $authorsList ,
            'page' => $page,
        ]);
    }
    public function actionBooks()
    {
        $query = Yii::$app->db->createCommand('select b.id, b.name, concat(a.firstname, \' \', a.lastname)
from books b left join authors a on  b.author_id=a.id
group by b.id, a.lastname, a.firstname
order by b.id')->queryAll();

        $page = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => count($query) ,
        ]);

        $sql = 'select b.id, b.name, concat(a.firstname, \' \', a.lastname) from books b left join authors a on  b.author_id=a.id group by b.id, a.lastname, a.firstname
order by b.id offset :off limit :lim';
        $booksList = Books::findBySql($sql, [':off' =>$page->offset , ':lim' =>$page->limit ])->asArray()->all();

        return $this->render('books',[
            'booksList' => $booksList ,
            'page' => $page ,
        ]);
    }

}
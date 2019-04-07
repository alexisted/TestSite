<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Список книг';
?>


<h1 align="center">Список книг:</h1>
<br>

<a href="<?= Url::to(['books/create'])?>" class="btn btn-primary">Добавить книгу</a>

<br><br>

<table class="table table-condensed">

        <tr>
            <th>ID</th>
            <th>название</th>
            <th></th>
        </tr>

<?php foreach ($booksList as $book):?>
    <tr>
        <td><?= $book->id;?></td>
        <td><?= $book->name;?></td>
        <td>
            <a href="<?= Url::to(['books/update', 'id' => $book->id]); ?>">Изменить</a>
            <a href="<?= Url::to(['books/delete', 'id' => $book->id]); ?>">Удалить</a>
        </td>
    </tr>
<?php endforeach;?>

</table>

<?= LinkPager::widget(['pagination' => $page ])?>
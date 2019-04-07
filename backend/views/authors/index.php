<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>


<h1 align="center">Список авторов</h1>
<br>

<a href="<?= Url::to(['authors/create'])?>" class="btn btn-primary">Добавить Автора</a>

<br><br>

<table class="table table-condensed">

        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th></th>
            <th></th>
        </tr>

<?php foreach ($authorsList as $author):?>
    <tr>
        <td><?= $author->id;?></td>
        <td><?= $author->firstname;?></td>
        <td><?= $author->lastname;?></td>
        <td>
            <a href="<?= Url::to(['authors/update', 'id' => $author->id]); ?>">Изменить</a>
            <a href="<?= Url::to(['authors/delete', 'id' => $author->id]); ?>">Удалить</a>
        </td>
    </tr>
<?php endforeach;?>

</table>

<?= LinkPager::widget(['pagination' => $page ])?>
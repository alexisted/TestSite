<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Авторы';
?>


<h1 align="center">Список авторов</h1>
<br>

<table class="table table-condensed">

    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>кол. книг</th>
    </tr>

    <?php foreach ($authorsList as $row):?>
        <tr>
            <td><?= $row['id'];?></td>
            <td><?= $row['firstname'];?></td>
            <td><?= $row['lastname'];?></td>
            <td><?= $row['count'];?></td>
        </tr>
    <?php endforeach;?>

</table>

<?= LinkPager::widget(['pagination' => $page ])?>
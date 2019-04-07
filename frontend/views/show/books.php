<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>


<h1 align="center">Список книг:</h1>
<br>

<table class="table table-condensed">

    <tr>
        <th>№</th>
        <th>название</th>
        <th>автор</th>
    </tr>

    <?php foreach ($booksList as $row):?>
        <tr>
            <td><?= $row['id'];?></td>
            <td><?= $row['name'];?></td>
            <td><?= $row['concat'];?></td>
        </tr>
    <?php endforeach;?>

</table>

<?= LinkPager::widget(['pagination' => $page ])?>
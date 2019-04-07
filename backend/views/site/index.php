<?php

/* @var $this yii\web\View */

$this->title = 'Книги и авторы';

use yii\helpers\Url; ?>
<div class="site-index">

    <div class="jumbotron">
        <a class="btn btn-lg btn-success" href="<?= Url::to(['authors/index'])?>">Авторы</a>
        <a class="btn btn-lg btn-success" href="<?= Url::to(['books/index'])?>">Книги</a>
    </div>

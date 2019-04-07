<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Добавте книгу:</h1>

<?php $form = ActiveForm::begin();?>

    <?php echo $form->field($modelB,'name'); ?>
    <?php echo $form->field($modelB,'author_id')->dropDownList($modelA,['prompt'=>'Выберите автора']); ?>

    <?php echo Html::submitButton('Добавить',[
        'class' => 'btn-btn-primary',
    ]); ?>
    <a href="<?= Url::to(['authors/create'])?>">Добавить Автора</a>

<?php ActiveForm::end();

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <h1>Изменить название книги №<?=$model->id;?></h1>

<?php $form = ActiveForm::begin();?>

    <?php echo $form->field($model,'name'); ?>
    <?php echo $form->field($model,'author_id')->dropDownList($modelA,['prompt'=>'Выберите автора']); ?>

<?php echo Html::submitButton('Изменить',[
    'class' => 'btn-btn-primary',
]); ?>

<?php ActiveForm::end();

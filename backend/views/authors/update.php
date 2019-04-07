<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <h1>Изменить автора №<?=$model->id;?></h1>

<?php $form = ActiveForm::begin();?>

<?php echo $form->field($model,'firstname'); ?>
<?php echo $form->field($model,'lastname'); ?>

<?php echo Html::submitButton('Добавить',[
    'class' => 'btn-btn-primary',
]); ?>

<?php ActiveForm::end();

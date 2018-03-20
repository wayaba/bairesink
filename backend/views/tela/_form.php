<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tela */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>
<div class="box-body">

    

	<div class="row">

	<div class="col-md-12">
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    </div>
	
</div>

<div class="box-footer">

        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

</div>
    <?php ActiveForm::end(); ?>

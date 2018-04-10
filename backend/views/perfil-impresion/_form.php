<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Socio */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $form = ActiveForm::begin(['enableAjaxValidation' => false]); ?>
<div class="box-body">
	<div class="row">
		<div class="col-md-6">
	    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
	    </div>
	</div>

</div>
<div class="box-footer">
       <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
    <?php ActiveForm::end(); ?>

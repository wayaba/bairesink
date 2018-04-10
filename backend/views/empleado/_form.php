<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Socio */
/* @var $form yii\widgets\ActiveForm */
?>

  
    
    <?php $form = ActiveForm::begin(['enableAjaxValidation' => false]); ?>
<div class="box-body">


	<div class="row">
		<div class="col-md-5">
	    <?= $form->field($modelPersona, 'nombre')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-5">
	    <?= $form->field($modelPersona, 'apellido')->textInput(['maxlength' => true]) ?>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-6">
	    <?= $form->field($modelPersona, 'telefono_fijo')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-6">
	    
	    <?= $form->field($modelPersona, 'telefono_celular')->textInput(['maxlength' => true]) ?>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-3">
	    <?= $form->field($modelPersona, 'direccion_calle')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-1">
    	<?= $form->field($modelPersona, 'direccion_numero')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-2">
    	<?= $form->field($modelPersona, 'direccion_departamento')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-2">
	    <?php
		$localidad = [0 =>'Castelar', 3=>'Hurlingham', 2=>'Ituzaingó' , 1=>'Morón', 4=>'Moreno']
		?>
	    <?= $form->field($modelPersona, 'direccion_localidad')->dropDownList($localidad) ?>
	    </div>
	    <div class="col-md-2">
	    <?php
		$prov = [0 =>'Buenos Aires']
		?>
	    <?= $form->field($modelPersona, 'direccion_provincia')->dropDownList($prov) ?>
	    </div>
		<div class="col-md-2">
	    <?= $form->field($modelPersona, 'direccion_codigo_postal')->textInput(['maxlength' => true]) ?>
	    </div>
	    
	</div>

	<div class="row">
		<div class="col-md-2">
	    <?= $form->field($modelPersona, 'dni')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-2">
    	<?= $form->field($modelPersona, 'fecha_nacimiento')->textInput(['class'=>'form-control datepicker']) ?>
	    </div>
		<div class="col-md-2">
	    <?php
		$sexo = [0 =>'Femenino', 1=>'Masculino']
		?>
	    <?= $form->field($modelPersona, 'sexo')->dropDownList($sexo) ?>
	    </div>
	    <div class="col-md-4">
	    <?= $form->field($modelPersona, 'email')->textInput(['maxlength' => true]) ?>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-2">
	    <?= $form->field($model, 'CUIT')->textInput(['maxlength' => true]) ?>
	    </div>
		<div class="col-md-6">
	    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
	    </div>
	</div>

</div>
<div class="box-footer">
       <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
    <?php ActiveForm::end(); ?>

<?php 
$this->registerJs("
		$('.datepicker').datepicker({language: 'es', format: 'dd/mm/yyyy',autoclose:true});		
		", View::POS_END);
?>

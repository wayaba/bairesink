<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cliente */

$this->title = 'Actualizar Empleado: ' . $modelPersona->nombre .' '.$modelPersona->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelPersona->nombre];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header with-border">
	        	<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
			</div>
			    <?= $this->render('_form', [
			        'model' => $model,
			        'modelPersona'=>$modelPersona,
			    ]) ?>
		</div>
	</div>
</div>

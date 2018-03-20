<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tela */

$this->title = 'Actualizar Tela: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion];
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
			    ]) ?>
		</div>
	</div>
</div>

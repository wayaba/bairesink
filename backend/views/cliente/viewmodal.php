<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

?>

<div class="modal fade" id="view-modal">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Detalle del cliente</h4>
	              </div>
	              <div class="modal-body">
	              	<div class="row-fluid">
	              	<div class="span12">
	              	<div class="box box-success">
	              	<div class="box-body">
						<?= DetailView::widget([
					        'model' => $model,
					        'attributes' => [
					            [
					                'attribute'=>'nombre',
					                'value'=>$model->persona->nombre
					            ],
					            [
					                'attribute'=>'apellido',
					                'value'=>$model->persona->apellido
					            ],
					            [
					                'attribute'=>'telefono_fijo',
					                'value'=>$model->persona->telefono_fijo
					            ],
					            [
					                'attribute'=>'telefono_celular',
					                'value'=>$model->persona->telefono_celular
					            ],
					            [
					                'attribute'=>'email',
					                'value'=>$model->persona->email
					            ],					            
					            [
					                'attribute'=>'fecha_nacimiento',
					                'value'=>$model->persona->fecha_nacimiento
					            ],
					            [
					                'attribute'=>'sexo',
					                'value'=>$model->persona->sexo
					            ],
					            [
					                'attribute'=>'dni',
					                'value'=>$model->persona->dni
					            ],
					            [
					                'attribute'=>'direccion_calle',
					                'value'=>$model->persona->direccion_calle
					            ],
					            [
					                'attribute'=>'direccion_numero',
					                'value'=>$model->persona->direccion_numero
					            ],
					            [
					                'attribute'=>'direccion_localidad',
					                'value'=>$model->persona->direccion_localidad
					            ],
					            [
					                'attribute'=>'direccion_provincia',
					                'value'=>$model->persona->direccion_provincia
					            ],
					            [
					                'attribute'=>'direccion_codigo_postal',
					                'value'=>$model->persona->direccion_codigo_postal
					            ],
					            [
					                'attribute'=>'direccion_departamento',
					                'value'=>$model->persona->direccion_departamento
					            ],
					        ],
					    ]) ?>
					    </div>
					    </div>
					    </div>
		              </div>
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
	              </div>
	            </div>
	            <!-- /.modal-content -->
	          </div>
	          <!-- /.modal-dialog -->
	</div>

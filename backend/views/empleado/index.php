<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\View;
use yii\helpers\Url;
use common\models\Pago;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header">

    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="box-tools">
    <p>
        <?= Html::a('Nuevo Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	</div>
</div>
<?php Pjax::begin(['id'=>'pjax-socios']); ?>

<div class="box-body table-responsive no-padding" >    
<?= GridView::widget([
		//'summary' => 'Mostrando {begin}-{end} de {totalCount}',
		'summary' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'tableOptions'=>['class'=> 'table table-hover'],
        'columns' => [
            [
                'attribute'=>'nombre',
                'value'=>'persona.nombre'
            ],
            [
                'attribute'=>'apellido',
                'value'=>'persona.apellido'
            ],
            [
                'attribute'=>'telefono_fijo',
                'value'=>'persona.telefono_fijo'
            ],
            [
                'attribute'=>'telefono_fijo',
                'value'=>'persona.telefono_fijo'
            ],
            [
                'attribute'=>'email',
                'value'=>'persona.email'
            ],
            'observacion',
            'CUIT',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',
            		
            		'buttons'=>
            		['view'=>function ($model, $key, $index) {
            			//return '<a href="javascript:openModal('.$key->id.')" title="Ver" data-toggle="tooltip" aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
            			return '<a href="javascript:openModal('.$key->id.')" data-toggle="tooltip" aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
            		
            		},
            		'update'=>function ($model, $key, $index) {
            		//return '<a href="/index.php?r=socio%2Fupdate&amp;id='.$key->id.'" title="Actualizar"  data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
            		return '<a href="/index.php?r=empleado%2Fupdate&amp;id='.$key->id.'" data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
            		
            		}
            		
            		
            		
            		]
            ],
        ],
    ]); ?>
    </div>
<?php Pjax::end(); ?>
</div>
<div id="modal-place-holder">
	
</div>
<?php 
$this->registerJs("

		function openModal(id)
		{
			$.post('". Url::to( ['empleado/show-modal'] ) ."',{id:id}
				).success(function(data)
				{
					$('#modal-place-holder').html(data);
					$('#view-modal').modal('show');
				}
				).error(function(data){	
				});			
		}
		
		
		
		
		
		
		", View::POS_END);
?>
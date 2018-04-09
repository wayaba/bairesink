<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {pay} {update}',
                
                'buttons'=>
                ['view'=>function ($model, $key, $index) {
                    //return '<a href="javascript:openModal('.$key->id.')" title="Ver" data-toggle="tooltip" aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    return '<a href="javascript:openModal('.$key->id.')" data-toggle="tooltip" aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
                    
                },
                'pay'=>function ($model, $key, $index) {
                //return '<a href="javascript:openPayModal('.$key->id.')" title="Cargar pago" data-toggle="tooltip"  aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-usd"></span></a>';
                return '<a href="javascript:openPayModal('.$key->id.')"  data-toggle="tooltip"  aria-label="View" data-placement="top" data-pjax="0"><span class="glyphicon glyphicon-usd"></span></a>';
                
                },
                'update'=>function ($model, $key, $index) {
                //return '<a href="/index.php?r=socio%2Fupdate&amp;id='.$key->id.'" title="Actualizar"  data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
                return '<a href="/index.php?r=cliente%2Fupdate&amp;id='.$key->id.'" data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
                
                }
                
                
                
                ]
                ],
        ],
    ]); ?>
</div>
<div id="modal-place-holder">
	
</div>
<?php 
$this->registerJs("

		function openModal(id)
		{
			$.post('". Url::to( ['cliente/show-modal'] ) ."',{id:id}
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
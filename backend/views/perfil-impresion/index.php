<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles de impresion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header">

    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="box-tools">
    <p>
        <?= Html::a('Nuevo Perfil impresion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	</div>
</div>
<?php Pjax::begin(['id'=>'pjax-perfilimpresion']); ?>

<div class="box-body table-responsive no-padding" >    
<?= GridView::widget([
		//'summary' => 'Mostrando {begin}-{end} de {totalCount}',
		'summary' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'tableOptions'=>['class'=> 'table table-hover'],
        'columns' => [
        	'descripcion',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete} {update}',
            		
            		'buttons'=>
            		[
            		'delete'=>function ($model, $key, $index) {
            		return '<a href="/index.php?r=perfil-impresion%2Fdelete&amp;id='.$key->id.'" data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0" data-method="post" data-confirm="¿Está seguro de eliminar este elemento?"><span class="glyphicon glyphicon-trash" ></span></a>';
            		
            		},
            		'update'=>function ($model, $key, $index) {
            		return '<a href="/index.php?r=perfil-impresion%2Fupdate&amp;id='.$key->id.'" data-toggle="tooltip"  data-placement="top" aria-label="Actualizar" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
            		
            		}
            		
            		
            		
            		]
            ],
        ],
    ]); ?>
    </div>
<?php Pjax::end(); ?>
</div>
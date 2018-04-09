<?php

namespace backend\controllers;

use Yii;
use common\models\Cliente;
use common\models\Persona;
use common\models\ClienteSearch;
use common\models\Socio;
use common\models\SocioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\JsonResponseFormatter;
use common\models\Pago;
use common\models\Configuracion;
use yii\bootstrap\ActiveForm;
use common\models\Vencimiento;
use yii\db\Query;
use yii\db\Expression;
use common\models\PagoSearch;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    public function actionShowModal()
    {
        if(Yii::$app->request->isAjax)
        {
            $model = $this->findModel(Yii::$app->request->post('id'));
            return $this->renderPartial('viewmodal',['model'=>$model]);
        }
        
    }
    
    /**
     * Displays a single Cliente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cliente();
        $modelPersona = new Persona();
        
       
        if ($model->load(Yii::$app->request->post()) && $modelPersona->load(Yii::$app->request->post())) {
            $modelPersona->save();
        
            $model->id_persona = $modelPersona->id;
            if($model->save())
            {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelPersona' => $modelPersona,
            ]);
        }
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $modelPersona = Persona::findOne($model->id_persona);
        
        if ($model->load(Yii::$app->request->post()) && $modelPersona->load(Yii::$app->request->post())) {
            $modelPersona->save();
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelPersona' => $modelPersona,
            ]);
        }
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

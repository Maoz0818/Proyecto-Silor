<?php

namespace backend\controllers;

use Yii;
use backend\models\Event;
use backend\models\search\EspacioSearch;
use backend\models\search\EventSearch;
use backend\models\MotivoEstado;
use backend\models\search\MotivoEstadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\icons\Icon;
use backend\models\ItemEspacio;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCalendario()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('calendario', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionJsoncalendar(){

        $events = Event::find()->where(['estado_id'=>'1'])->asArray()->all();

        $tasks = [];

        foreach ($events as $eve) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = ArrayHelper::getValue($eve, 'id');
            $event->title = ArrayHelper::getValue($eve, 'title');
            $event->start = ArrayHelper::getValue($eve, 'start_date');
            $event->end = ArrayHelper::getValue($eve, 'end_date');
            $event->description = ArrayHelper::getValue($eve, 'description');
            $tasks[] = $event;
        }

        header('Content-type: application/json; charset=utf-8');
        return Json::encode($tasks);
        Yii::$app->end();
    }

    /**
     * Displays a single Event model.
     * @param string $id
     * @param string $description
     * @return mixed
     */
    public function actionView($id, $description)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $description),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fecha)
    {
        $model = new Event();
        $model->fecha = $fecha;
        $item = new ItemEspacio();
        $searchModel = new EspacioSearch();
        $dataProvider = $searchModel->searchParaReserva(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $item->load(Yii::$app->request->post()) && Model::validateMultiple([$model, $item])) {
            $model->save(false); // skip validation as model is already validated
            $item->event_id = $model->id; // no need for validation rule on user_id as you set it yourself
            $item->save(false); 
            Yii::$app->session->setFlash('success', Icon::show('check').'Se a creado una nueva reserva.');
            return $this->redirect(['calendario']);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
                'item' => $item,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $description
     * @return mixed
     */
    public function actionUpdate($id, $description)
    {   
        $model = $this->findModel($id, $description);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            switch($model->estado_id){
                case 1:
                    Yii::$app->session->setFlash('success', Icon::show('check').'La solicitud de reserva "'.$model->title.'" cambio a estado "Aprobada"');
                    break;

                case 2:
                    Yii::$app->session->setFlash('success', Icon::show('check').'La solicitud de reserva '.$model->title.' cambio a estado "Pendiente"');
                    break;

                case 3:
                    Yii::$app->session->setFlash('success', Icon::show('check').'La solicitud de reserva '.$model->title.' cambio a estado "Negada"');
                    break;

                case 4:
                    Yii::$app->session->setFlash('success', Icon::show('check').'La solicitud de reserva '.$model->title.' cambio a estado "Cancelada"');
                    break;
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

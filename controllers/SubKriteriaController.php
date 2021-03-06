<?php

namespace app\controllers;

use Yii;
use app\models\SubKriteria;
use app\models\search\SubKriteria as SubKriteriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SubKriteriaController implements the CRUD actions for SubKriteria model.
 */
class SubKriteriaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all SubKriteria models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new SubKriteriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id_kriteria' => $id
        ]);
    }

    /**
     * Displays a single SubKriteria model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubKriteria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_kriteria)
    {
        $model = new SubKriteria();
        $modelSearch = new SubKriteriaSearch();
        $listParent = ArrayHelper::map($modelSearch->getParents()->asArray()->all(), 'id_subkriteria', 'nama_subkriteria');

        if ($model->load(Yii::$app->request->post())) {
            $model->id_kriteria = $id_kriteria;
            if (empty($model->id_parent_subkriteria)) {
                $model->id_parent_subkriteria = '0';
            }
            if ($model->save()) {
                return $this->redirect(['sub-kriteria', 'id_subkriteria' => $id_kriteria]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'listParent' => $listParent
        ]);
    }

    /**
     * Updates an existing SubKriteria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelSearch = new SubKriteriaSearch();
        $listParent = ArrayHelper::map($modelSearch->getParents()->asArray()->all(), 'id_subkriteria', 'nama_subkriteria');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_subkriteria]);
        }

        return $this->render('update', [
            'model' => $model,
            'listParent' => $listParent
        ]);
    }

    /**
     * Deletes an existing SubKriteria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SubKriteria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubKriteria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubKriteria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSubKriteria($id_subkriteria)
    {
        $searchModel = new SubKriteriaSearch();
        $dataProvider = $searchModel->searchChild(Yii::$app->request->queryParams, $id_subkriteria);

        return $this->render('sub-kriteria', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id_subkriteria' => $id_subkriteria
        ]);
    }
}

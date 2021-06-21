<?php

namespace app\controllers;

use Yii;
use app\models\Warga;
use app\models\search\Warga as WargaSearch;
use app\models\search\SubKriteria as SubKriteriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * WargaController implements the CRUD actions for Warga model.
 */
class WargaController extends Controller
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
     * Lists all Warga models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new WargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id_kk' => $id
        ]);
    }

    /**
     * Displays a single Warga model.
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
     * Creates a new Warga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_kk)
    {
        $model = new Warga();
        $modelSearch = new SubKriteriaSearch();
        $listParent = ArrayHelper::map($modelSearch->getParents()->asArray()->all(), 'id_subkriteria', 'nama_subkriteria');

        if (!empty($listParent)) {
            $childs = [];
            foreach ($listParent as $list => $parent) {
                $childs[$list] = ArrayHelper::map($modelSearch->getChilds($list)->asArray()->all(), 'id_subkriteria', 'nama_subkriteria');
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            print_r('<pre>');
            $nilai_c1 = $modelSearch->getNilaiById($model->id_c1);
            $nilai_c2 = $modelSearch->getNilaiById($model->id_c2);
            $nilai_c3 = $modelSearch->getNilaiById($model->id_c3);
            $nilai_c4 = $modelSearch->getNilaiById($model->id_c4);
            $nilai_c5 = $modelSearch->getNilaiById($model->id_c5);
            $nilai_c6 = $modelSearch->getNilaiById($model->id_c6);
            $model->id_kk = $id_kk;
            $model->nilai_c1 = $nilai_c1->nilai;
            $model->nilai_c2 = $nilai_c2->nilai;
            $model->nilai_c3 = $nilai_c3->nilai;
            $model->nilai_c4 = $nilai_c4->nilai;
            $model->nilai_c5 = $nilai_c5->nilai;
            $model->nilai_c6 = $nilai_c6->nilai;
            // var_dump($model);die;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_warga]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'list_kriteria' => $listParent,
            'list_subkriteria' => $childs
        ]);
    }

    /**
     * Updates an existing Warga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_warga]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Warga model.
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
     * Finds the Warga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Warga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Warga::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

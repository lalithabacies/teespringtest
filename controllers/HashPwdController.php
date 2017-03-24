<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\searchHashPwd;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HashPwdController implements the CRUD actions for HashPwd model.
 */
class HashPwdController extends Controller
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
     * Lists all HashPwd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new searchHashPwd();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HashPwd model.
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
     * Creates a new HashPwd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
			$model->setPassword($model->password_hash);
			if($model->save()){
				//login the user here
				Yii::$app->user->login(User::findByUsername($model->username),  3600*24*30 );
			}
            return $this->redirect(['view', 'id' => $model->id]);
			
        } else {
			//$password_hash=$model->generatePwdHash($model->password_hash);
			//print"<script>alert('as')</script>";
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HashPwd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HashPwd model.
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
     * Finds the HashPwd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HashPwd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HashPwd::findOne($id)) !== null) {
			/*if($model->password_hash){
			$model=new HashPwd();
			$password_hash=$model->generatePwdHash($model->password_hash);
			$model->password_hash=$password_hash;
			//$model->save();
			}*/
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

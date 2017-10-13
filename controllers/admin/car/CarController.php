<?php

namespace app\controllers\admin\car;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

use app\models\ContactForm;

use app\models\car\Car;
use app\models\car\Search;
use app\queue\DownloadJob;

use Codeception\Module\Redis;

class CarController extends Controller
{


    /**
     * Lists all Data models.
     * @return mixed
     */
    public function actionIndex()
    {
      //



//        $redis = new \yii\redis\Connection();
//
//        $redis->publish('queue', 'any thisn hello, world!');
//        file_put_contents('./image.jpg', file_get_contents('https://images.pexels.com/photos/33109/fall-autumn-red-season.jpg'));
        Yii::$app->queue->push(new DownloadJob([
            'url' => 'https://images.pexels.com/photos/33109/fall-autumn-red-season.jpg',
            'file' => './new image name.jpg',
        ]));

        $searchModel = new Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays Register form
     *
     * @return Response|string
     */
    public function actionCreate(){

        $model = new Car();
        if ($model->load(Yii::$app->request->post()) ) {
            // Yii::$app->session->setFlash('contactFormSubmitted');

            if ($model->save()) {
                return $this->redirect('index');
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }


    /**
     * Displays Register form
     *
     * @return Response|string
     */
    public function actionUpdate($id){

        //$model =Car::findOne($id);
        $model=Car::findOne($id);
        if ($model->load(Yii::$app->request->post()) ) {
            // Yii::$app->session->setFlash('contactFormSubmitted');

            if ($model->save($id)) {
                return $this->redirect('index');
            }
        }
        return $this->render('update', [
            'model' => $model,

        ]);

    }
    /**
     * Displays a single Data model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => car::findOne($id),
        ]);
    }

    /**
     * Deletes an existing Data model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Car::findOne($id);
          if ($model  !== null) {
              $model->delete();
          }


        return $this->redirect(['index']);
    }

}

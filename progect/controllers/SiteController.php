<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */

    public function actionAbout()
    {
        return $this->render('about');
    }
///////////////////////////////////////////
    public function actionShop(){
    $ANSWER = (new \yii\db\Query())
    ->select(['id',
        'NameProduct',
        'Price',
        'CountBox',
        'CountPackage',
        'charge',
        'Distance',
        'time',
        'Caliber',
        'InStock',
        'Discount'])
    ->from('product')
    ->all();
    Yii::$app->assetManager->forceCopy = true;
        return $this->render("shop",['ANSWER'=>$ANSWER]);
    }
    public function actionIn($id) 
    {
        //   \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
        
       $RESOURSE =  Yii::$app->request->get();
        //Yii::$app->request->url
      
        Yii::$app->db->createCommand("INSERT INTO `product` (`id`, `NameProduct`, `Price`, `CountBox`, `CountPackage`, `charge`, `Distance`, `time`, `Caliber`, `InStock`, `Discount`) VALUES (NULL, 'Петарды', '10000', '24', '30', '10', '12.45', '11111111', '22', '9999', '0');")->execute();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $RESOURSE;

    }
    public function actionUpdate($id) 
    {
        //   \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
        
       $RESOURSE =  Yii::$app->request->get();
        //Yii::$app->request->url
      
        Yii::$app->db->createCommand("UPDATE `product` SET `NameProduct` = 'Петарда' WHERE `product`.`id` = 1; ")->execute();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $RESOURSE;

    }
    public function actionDelete($id) 
    {
        //   \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; 
        
       $RESOURSE =  Yii::$app->request->get();
        //Yii::$app->request->url
      
        Yii::$app->db->createCommand("")->execute();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $RESOURSE;

    }
}
////////////////////////
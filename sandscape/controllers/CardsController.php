<?php

class CardsController extends Controller {

    private $menu;

    function __construct($id, $module) {
        parent::__construct($id, $module);

        $this->menu = array(
            array('label' => 'Cards', 'url' => array('/cards'), 'active' => true),
            array('label' => 'Cleanup', 'url' => array('/cleanup')),
            array('label' => 'CMS', 'url' => array('/pages')),
            array('label' => 'Logs', 'url' => array('/logs')),
            array('label' => 'Options', 'url' => array('/options')),
            array('label' => 'Users', 'url' => array('/users')),
        );
    }

    /* public function filters() {
      return array(
      'accessControl', // perform access control for CRUD operations
      );
      } */

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /* public function accessRules() {
      return array(
      array('allow', // allow all users to perform 'index' and 'view' actions
      'actions' => array('index', 'view'),
      'users' => array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('create', 'update'),
      'users' => array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions' => array('admin', 'delete'),
      'users' => array('admin'),
      ),
      array('deny', // deny all users
      'users' => array('*'),
      ),
      );
      } */

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Card;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Card'])) {
            $model->attributes = $_POST['Card'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->cardId));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Card'])) {
            $model->attributes = $_POST['Card'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->cardId));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $viewData = array('menu' => $this->menu, 'dataProvider' => new CActiveDataProvider('Card'));
        $this->render('index', $viewData);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        //$model = new Card('search');
        //$model->unsetAttributes();  // clear any default values
        //if (isset($_GET['Card']))
        //    $model->attributes = $_GET['Card'];

        $this->render('admin', array(
            'model' => new Card()//$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Card::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'card-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

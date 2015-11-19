<?php

class CommodityController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','epc'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionEpc()
    {
        $this->render('epc');
    }

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Commodity;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Commodity']))
		{
			$model->attributes=$_POST['Commodity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Commodity']))
		{
			$model->attributes=$_POST['Commodity'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model = new ChartDataForm();
//        $profitForm = new ChartDataForm();
//        $revenueForm = new ChartDataForm();

        $model->startDate = date('01/m/Y'); // hard-coded '01' for first day
        $model->endDate  = date('t/m/Y');
        $profitForm = $model;
        $revenueForm = $model;

        if(isset($_POST['ChartDataForm'])) {
            $model->attributes = $_POST['ChartDataForm'];
            $out = "";
            switch ($model->type) {
                case 'profit':
                    $out .= "PROFIT";
                    $profitForm = $model;
                    break;
                case 'revenue':
                    $out .= "REVENUE";
                    $revenueForm = $model;
                    break;
            }
            foreach($_POST['ChartDataForm'] as $name=>$value)
            {
                $out .= $name."=".$value." ";
            }
            Yii::app()->user->setFlash('success', 'Данные обновлены ');
        }


        $startDate = str_replace('/', '-', $model->startDate);
        $endDate = str_replace('/', '-', $model->endDate);

        $criteria = new CDbCriteria;
        //$criteria->addBetweenCondition('date', $startDate, $model->endDate);
        $criteria->condition = "date BETWEEN STR_TO_DATE('$startDate', '%d-%m-%Y') AND STR_TO_DATE('$endDate', '%d-%m-%Y') ORDER BY date ASC";
        $sales = Sales::model()->findAll($criteria);

        $profit = array(array('Дата', 'Прибыль'));
        $revenue = array(array('Дата', 'Выручка'));
        if ($sales) foreach ($sales as $model) {
            $total_profit = 0;
            $total_revenue = 0;
            foreach ($model->commodities as $commodity) {
                $total_profit += $commodity->profit;
                $total_revenue += $commodity->revenue;
            }
            array_push($profit, array($model->date, $total_profit));
            array_push($revenue, array($model->date, $total_revenue));
        }

		$dataProvider=new CActiveDataProvider('Commodity');
        $this->render('index',array(
			'dataProvider'=>$dataProvider,
            'profit'=>$profit,
            'profitForm'=>$profitForm,
            'revenueForm'=>$revenueForm,
            'revenue'=>$revenue,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Commodity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Commodity']))
			$model->attributes=$_GET['Commodity'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Commodity the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Commodity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Commodity $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='commodity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

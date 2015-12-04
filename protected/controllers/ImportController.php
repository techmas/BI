<?php

class ImportController extends Controller
{

    public function actionImport()
    {
        PlatformUtil::importDirect();
        $model1C = new Import1CForm();
        $modelGA = new ImportGAForm();
        $out = "";

        if(isset($_POST['ImportGAForm'])) {
            $modelGA->attributes = $_POST['ImportGAForm'];
            $out = PlatformUtil::importGA();
            Yii::app()->user->setFlash('successGA', 'Данные импортированы'.$out);
            $this->redirect(array('import'));
        }

        $form1C = new CForm('application.views.site.uploadForm', $model1C);
        if ($form1C->submitted('submit') && $form1C->validate()) {
            $form1C->model->image = CUploadedFile::getInstance($form1C->model, 'image');
            $form1C->model->image->saveAs("assets/tmp");
            $out = PlatformUtil::import1C();
            Yii::app()->user->setFlash('success1C', 'Данные импортированы'.$out);
            $this->redirect(array('import'));
        }
        $this->render('import', array('form1C' => $form1C, 'modelGA'=>$modelGA));
    }

    public function actionImport1C() {
        $model = new Import1CForm();
        $form = new CForm('application.views.site.uploadForm', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->image = CUploadedFile::getInstance($form->model, 'image');
            $form->model->image->saveAs("assets/tmp");

            Yii::app()->user->setFlash('success', 'Файл загружен'.$out);
            $this->redirect(array('import1C'));
        }
        $this->render('import1C', array('form' => $form));
    }


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
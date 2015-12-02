<?php

class ImportController extends Controller
{

    public function actionImport()
    {
        $user = User::model()->findByPK(1);
        $token = "";
        foreach ($user->params as $param) {
            $token = ($param->name == "directToken") ? $param->value : "";
        }
        if ($token == "") {
            $code = Yii::app()->request->getParam('code');
            $link = Yii::app()->direct->getAuthorizeUrl();
            if (!$code) $this->redirect($link);
            $token = Yii::app()->direct->getDirectToken($code);
            $param = new Param();
            $param->name = "directToken";
            $param->value = $token;
            $param->user_id = $user->id;
            $param->save();
        }

        Yii::app()->direct->setToken($token);

        $result = Yii::app()->direct->getSummaryStat(array(
            'CampaignIDS' => array(115158),
            'StartDate' => '2014-01-01',
            'EndDate' => '2015-12-01',
        ));


        if (!$result) {
            echo "error". Yii::app()->direct->getError();
        }

        print_r($result);

        foreach ($result as $item)
            foreach ($item as $row) {
                echo $row['CampaignID']."wef<br>";
            }


        $result = Yii::app()->direct->GetBalance(array(115158
            //'CampaignIDS' => array(1),
            //'StartDate' => '2007-01-01',
            //'EndDate' => '2016-01-01',
        ));

        foreach ($result as $item)
            foreach ($item as $row) {
                echo $row['CampaignID']."<br>";
            }
        print_r($result);

        $model1C = new Import1CForm();
        $modelGA = new ImportGAForm();
        $out = "";

        if(isset($_POST['ImportGAForm'])) {
            $modelGA->attributes = $_POST['ImportGAForm'];
            $out = $this->importGA();
            Yii::app()->user->setFlash('successGA', 'Данные импортированы'.$out);
            $this->redirect(array('import'));
        }

        $form1C = new CForm('application.views.site.uploadForm', $model1C);
        if ($form1C->submitted('submit') && $form1C->validate()) {
            $form1C->model->image = CUploadedFile::getInstance($form1C->model, 'image');
            $form1C->model->image->saveAs("assets/tmp");
            $out = $this->import1C();
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

    public function import1C() {
        // Start import from file
        error_reporting(E_ALL & ~E_NOTICE);

        $xml_string = file_get_contents("assets/tmp");

        $xml = simplexml_load_string($xml_string, 'JsonXMLElement');
        $json = json_encode($xml, JSON_PRETTY_PRINT);
        $array = json_decode($json,TRUE);

        // Helper to parse groups in models
        function process_group($data, $date) {
            $name = $data["name"];
            $date = date('Y-m-d', strtotime($date));

            $sales = Sales::model()->find("date='".$date."'");
            if (!$sales) {
                $sales = new Sales();
                $sales->date = $date;
                $sales->save();
            }

            $commodity = Commodity::model()->find("name='".$name."' and sales_id=".$sales->id);
            if (!$commodity) {
                $commodity = new Commodity();
            }
            $commodity->name = $name;
            $commodity->profit = $data["profit"];
            $commodity->revenue = $data["revenue"];
            $commodity->sales_id = $sales->id;
            $commodity->save();

            $out .= "<br>" .$name;
        }

        // Helper parse process
        function process_date($date) {
            $out .= "<br><br> date ";
            $day = $date["day"];
            $out .= $day."<br>";
            $group = $date["group"];
            if (is_array($group[0]))
                foreach ($group as $key=>$value) {
                    if (is_numeric($key)) process_group($value, $day);
                }
            else process_group($group, $day);
        }

        // Loop for all dates in XML
        foreach ($array as $content)
            foreach ($content as $date)
                process_date($date);
        return $out;
    }

    public function importGA()
    {
        require 'gapi.class.php';
        define('ga_profile_id','9862155');

        $ga = new gapi("667531573047-t1dg7n8l808ab4rqm81e8q5rvi7eudqe@developer.gserviceaccount.com", "test/integrateGA-6727fbd5be3b.p12");
        $filter = 'country == United States && browser == Firefox || browser == Chrome';

        $dimensions=array('date');
        $metric=array('visits');
        $startDate="2015-10-01";
        $endDate="2015-11-01";
        $filter="";
        $sort="-date";
        $out="";

        function storeVisit($data) {
            $date = $data;
            $date = date('Y-m-d', strtotime($date));
            $total = $data->getVisits();

            $sales = Sales::model()->find("date='".$date."'");
            if (!$sales) {
                $sales = new Sales();
                $sales->date = $date;
                $sales->save();
            }

            $visits = Visits::model()->find("sales_id=".$sales->id);
            if (!$visits) $visits = new Visits();
            $visits->sales_id = $sales->id;
            $visits->total = $total;
            $visits->save();

            return "<br>".$date." - ".$total;
        }

        $ga->requestReportData(ga_profile_id, $dimensions ,$metric, $sort, null, $startDate, $endDate);
        // foreach($ga->getResults() as $result) $out .= storeVisit($result);

        $dimensions=array('goalCompletionLocation');
        $goal = 'goal2ConversionRate';
        $method = "get".$goal;
        $metric=array($goal);
        $startDate="2015-10-01";
        $endDate="2015-11-01";
        $filter="";
        $sort="";

        $ga->requestReportData(ga_profile_id, $dimensions ,$metric, $sort, null, $startDate, $endDate);
        foreach($ga->getResults() as $result)
            $out .= "r".$result->$method();

        return $out;
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
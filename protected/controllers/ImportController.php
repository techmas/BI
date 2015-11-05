<?php

class ImportController extends Controller
{
    public function actionImport1C()
    {
        $model = new Import1CForm();
        $form = new CForm('application.views.site.uploadForm', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->image = CUploadedFile::getInstance($form->model, 'image');
            $form->model->image->saveAs("assets/tmp");

            // Start import from file
            error_reporting(E_ALL & ~E_NOTICE);

            $xml_string = file_get_contents("assets/tmp");

            $xml = simplexml_load_string($xml_string, 'JsonXMLElement');
            $json = json_encode($xml, JSON_PRETTY_PRINT);
            $array = json_decode($json,TRUE);

            // Helper to parse groups in models
            function process_group($data, $day) {
                $name = $data["name"];
                $date = date('Y-m-d', strtotime($day));

                // Get existing group or create new
                $group = Group::model()->find("name='".$name."'");
                if (!$group) {
                    $group = new Group();
                    $group->name = $name;
                    $group->save();
                }
                $id = $group->id;

                // Get existing profit date or create new
                $profit = Profit::model()->find("date='".$date."' and group_id=".$id);
                if (!$profit) {
                    $profit = new Profit();
                }
                $profit->date = $date;
                $profit->total = $data["profit"];
                $profit->group_id = $id;
                $profit->save();

                // Get existing revenue date or create new
                $revenue = Revenue::model()->find("date='".$date."' and group_id=".$id);
                if (!$revenue) {
                    $revenue = new Revenue();
                }
                $revenue->date = $date;
                $revenue->total = $data["revenue"];
                $revenue->group_id = $id;
                $revenue->save();

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

            Yii::app()->user->setFlash('success', 'Файл загружен'.$out);
            $this->redirect(array('import1C'));
        }
        $this->render('import1C', array('form' => $form));
    }


    /**
     * Displays the import GA page
     */
    public function actionImportGA()
    {
        $model=new ImportGAForm();
        if(isset($_POST['ImportGAForm']))
        {
            $model->attributes=$_POST['ImportGAForm'];

            //echo "<br>".$model->startDate;
            //echo "<br>".$model->endDate;

            //error_reporting(E_ALL);
            //ini_set("display_errors",1);

            require 'gapi.class.php';
            define('ga_profile_id','9862155');

            $ga = new gapi("667531573047-t1dg7n8l808ab4rqm81e8q5rvi7eudqe@developer.gserviceaccount.com", "test/integrateGA-6727fbd5be3b.p12");
            //$ga = new gapi("XXXXXXXX@developer.gserviceaccount.com", "key.p12");

            /**
             * Note: OR || operators are calculated first, before AND &&.
             * There are no brackets () for precedence and no quotes are
             * required around parameters.
             *
             * Do not use brackets () for precedence, these are only valid for
             * use in regular expressions operators!
             *
             * The below filter represented in normal PHP logic would be:
             * country == 'United States' && ( browser == 'Firefox || browser == 'Chrome')
             */

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
                $total = $data->getVisits();

                // Get existing group or create new
                $visits = Visits::model()->find("date=".$date);
                if (!$visits) {
                    $visits = new Visits();
                }
                $visits->total = $total;
                $visits->save();

                return "<br>".$date." - ".$total;
            }

            $ga->requestReportData(ga_profile_id, $dimensions ,$metric, $sort, null, $startDate, $endDate);
            foreach($ga->getResults() as $result) {
                $out .= storeVisit($result);
            }

            /*            echo $result ?>
                        echo $result->getVisits() ?>
                    <td><?php echo $ga->getTotalResults() ?></td>
                    <td><?php echo $ga->getVisits() ?></td>
            */

            Yii::app()->user->setFlash('success', 'Данные загружены'.$out);
            $this->redirect(array('importGA'));
        }
        $this->render('importGA',array('model'=>$model));
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
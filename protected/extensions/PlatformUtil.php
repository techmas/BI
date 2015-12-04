<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 03.12.15
 * Time: 11:54
 */

class PlatformUtil {

    public function importGA()
    {
        require 'gapi.class.php';
        define('ga_profile_id','9258418');

        $ga = new gapi("667531573047-t1dg7n8l808ab4rqm81e8q5rvi7eudqe@developer.gserviceaccount.com", "test/integrateGA-6727fbd5be3b.p12");
        $filter = 'country == United States && browser == Firefox || browser == Chrome';

        $dimensions=array('date');
        $metric=array('visits');
        $startDate="2015-10-01";
        $endDate="2015-11-01";
        $filter="";
        $sort="-date";
        $out="";

        $ga->requestReportData(ga_profile_id, $dimensions ,$metric, $sort, null, $startDate, $endDate);
        foreach($ga->getResults() as $result)
            $out .= DataUtil::storeModelByDate('Visits', $result, 'total', $result->getVisits(), 2);

        $dimensions=array('date');
        $goal = 'goalStartsAll';
        $method = "get".$goal;
        $metric=array($goal);
        $filter="";
        $sort="-date";

        $ga->requestReportData(ga_profile_id, $dimensions ,$metric, $sort, null, $startDate, $endDate);
        foreach($ga->getResults() as $result)
            $out .= DataUtil::storeModelByDate('Conversion', $result, 'total', $result->$method(), 2, 1);

        return $out;
    }

    public function importDirect(){

        $user = User::model()->findByPK(2);
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

        $result = Yii::app()->direct->getCampaignsParams(array(
            'CampaignIDS' => array(116039),
        ));
        if (!$result) echo "error". Yii::app()->direct->getError();
        // print_r($result);

        $result = Yii::app()->direct->getSummaryStat(array(
            'CampaignIDS' => array(116039),
            'StartDate' => '2015-12-01',
            'EndDate' => '2015-12-30',
        ));

        if (!$result) echo "error". Yii::app()->direct->getError();

        // TODO: Test data, make it real
        $sales = DataUtil::getSalesByDates('2015-10-01', '2015-11-01');
        foreach($sales as $sale) {
            DataUtil::storeModelByDate('Visits', $sale->date, 'total', rand(500,15000), 3);
            DataUtil::storeModelByDate('Expences', $sale->date, 'total', rand(100,2000), 3);
        }

        //print_r($result);
    }

    public function import1C() {
        // Start import from file
        error_reporting(E_ALL & ~E_NOTICE);

        $xml_string = file_get_contents("assets/tmp");

        $xml = simplexml_load_string($xml_string, 'JsonXMLElement');
        $json = json_encode($xml, JSON_PRETTY_PRINT);
        $array = json_decode($json,TRUE);

        // Helper to parse groups in models
        function process_group($data, $sales_id) {
            $name = $data["name"];
            $commodity = Commodity::model()->find("name='".$name."' and sales_id=".$sales_id);
            if (!$commodity) {
                $commodity = new Commodity();
            }
            $commodity->name = $name;
            $commodity->profit = $data["profit"];
            $commodity->revenue = $data["revenue"];
            $commodity->quantity = $data["quantity"];
            // TODO: Make App constant
            $commodity->platform_id = 1;
            $commodity->sales_id = $sales_id;
            $commodity->save();

            $out .= "<br>" .$name;
        }

        // Helper parse process
        function process_date($date) {
            $out .= "<br><br> date ";
            $day = $date["day"];
            if (!$orders) {
                $orders = new Orders();
            }
            $day = date('Y-m-d', strtotime($day));
            $sales = Sales::model()->find("date='".$day."'");
            if (!$sales) {
                $sales = new Sales();
                $sales->date = $day;
                $sales->save();
            }
            $orders->total = $date["orders"];
            $orders->sales_id = $sales->id;
            // TODO: Make App constant
            $orders->platform_id = 1;
            $orders->save();
            $out .= $day."<br>";
            $group = $date["group"];
            if (is_array($group[0]))
                foreach ($group as $key=>$value) {
                    if (is_numeric($key)) process_group($value, $sales->id);
                }
            else process_group($group, $sales->id);
        }

        // Loop for all dates in XML
        foreach ($array as $content)
            foreach ($content as $date)
                process_date($date);
        return $out;
    }

} 
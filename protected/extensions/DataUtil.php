<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 22.11.15
 * Time: 20:18
 */

class DataUtil {

    function getIndicatorUserview($indicator, $user) {
        $userview = new Userview();
        foreach ($indicator->userviews as $view)
            $userview = ($view->user == $user) ? $view : $userview;
        return $userview;
    }

    function getSalesByUserview($userview) {
        $criteria = new CDbCriteria;
        $criteria->condition = "date BETWEEN STR_TO_DATE('".
            $userview->startdate."', '%Y-%m-%d') AND STR_TO_DATE('".
            $userview->enddate."', '%Y-%m-%d') ORDER BY date ASC";
        $sales = Sales::model()->findAll($criteria);
        return $sales;
    }

    function calculateEPC() {
        $user = User::model()->findByPk(1);
        $indicator = Indicator::model()->findByPk(4);
        $userview = DataUtil::getIndicatorUserview($indicator, $user);
        $sales = DataUtil::getSalesByUserview($userview);

        foreach ($sales as $model) {
            $profit = 0;
            $visits = 0;
            foreach ($model->commodities as $data) $profit += $data->profit;
            foreach ($model->visits as $data) $visits += $data->total;

            $epc = $profit / $visits;

            $measure = new Measure('sales_id',$model->id);
            if ($model->measures)
                foreach ($model->measures as $data)
                    $measure = $data;
            $measure->epc = $epc;
            $measure->sales_id = $model->id;
            $measure->save();

        }
    }

} 
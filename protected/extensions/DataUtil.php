<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 22.11.15
 * Time: 20:18
 */

class DataUtil
{

    function getIndicatorUserview($indicator, $user)
    {
        $userview = new Userview();
        foreach ($indicator->userviews as $view)
            $userview = ($view->user == $user) ? $view : $userview;
        return $userview;
    }

    function getSalesByUserview($userview)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "date BETWEEN STR_TO_DATE('" .
            $userview->startdate . "', '%Y-%m-%d') AND STR_TO_DATE('" .
            $userview->enddate . "', '%Y-%m-%d') ORDER BY date ASC";
        $sales = Sales::model()->findAll($criteria);
        return $sales;
    }

    function getSalesByDates($startdate, $enddate)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "date BETWEEN STR_TO_DATE('" .
            $startdate . "', '%Y-%m-%d') AND STR_TO_DATE('" .
            $enddate . "', '%Y-%m-%d') ORDER BY date ASC";
        $sales = Sales::model()->findAll($criteria);
        return $sales;
    }

    function getValueBySales($sales, $model, $field)
    {
        $result = 0;
        foreach ($sales as $sale)
            foreach ($sale->$model as $record)
                $result += $record->$field;
        return $result;
    }

    function getTableFromFormula($formula)
    {
        $args = explode(".", $formula);
        return $args[0];
    }

    function getFieldFromFormula($formula)
    {
        $args = explode(".", $formula);
        return $args[1];
    }

    function getIndicatorValue($indicator, $sale)
    {
        $args = explode(".", $indicator->value);
        $table = $args[0];
        $column = $args[1];
        $total = 0;
        foreach ($sale->$table as $data) $total += $data->$column;
        return $total;
    }

    function storeModelByDate($model, $date, $field, $value, $platform = 0, $target = 0)
    {
        $date = date('Y-m-d', strtotime($date));

        $sales = Sales::model()->find("date='" . $date . "'");
        if (!$sales) {
            $sales = new Sales();
            $sales->date = $date;
            $sales->save();
        }
        $suffix = $platform ? " AND platform_id=" . $platform : "";
        $suffix .= $target ? " AND target_id=" . $target : "";
        $record = $model::model()->find("sales_id=" . $sales->id . $suffix);
        if (!$record) $record = new $model();
        $record->sales_id = $sales->id;
        $record->$field = $value;
        if ($platform) $record->platform_id = $platform;
        if ($target) $record->target_id = $target;
        $record->save();

        return "<br>" . $date . " - " . $value;
    }

    function calculateEPC($sales)
    {
        foreach ($sales as $sale) {
            $profit = 0;
            $visits = 0;
            foreach ($sale->commodities as $data) $profit += $data->profit;
            foreach ($sale->visits as $data) $visits += $data->total;
            $epc = $visits ? $profit / $visits : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'epc', $epc);
        }
    }

    function calculateCRS($sales)
    {
        foreach ($sales as $sale) {
            $orders = 0;
            $visits = 0;
            foreach ($sale->orders as $data) $orders += $data->total;
            foreach ($sale->visits as $data) $visits += $data->total;
            $crs = $visits ? $orders / $visits : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'crs', $crs);
        }
    }

    function calculateARPU($sales)
    {
        foreach ($sales as $sale) {
            $orders = 0;
            $revenue = 0;
            foreach ($sale->orders as $data) $orders += $data->total;
            foreach ($sale->commodities as $data) $revenue += $data->revenue;
            $arpu = $orders ? $revenue / $orders : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'arpu', $arpu);
        }
    }

    function calculateLTV($sales)
    {
        foreach ($sales as $sale) {
            $orders = 0;
            $arpu = 0;
            foreach ($sale->orders as $data) $orders += $data->total;
            foreach ($sale->measures as $data) $arpu += $data->arpu;
            $ltv = $arpu * $orders;
            DataUtil::storeModelByDate('Measure', $sale->date, 'ltv', $ltv);
        }
    }

    function calculateIncome($sales)
    {
        foreach ($sales as $sale) {
            $profit = 0;
            $expences = 0;
            foreach ($sale->commodities as $data) $profit += $data->profit;
            foreach ($sale->expences as $data) $expences += $data->total;
            $income = $profit - $expences;
            DataUtil::storeModelByDate('Measure', $sale->date, 'income', $income);
        }
    }

    function calculateROI($sales)
    {
        foreach ($sales as $sale) {
            $income = 0;
            $expences = 0;
            foreach ($sale->measures as $data) $income += $data->income;
            foreach ($sale->expences as $data) $expences += $data->total;
            $roi = $expences ? $income / $expences : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'roi', $roi);
        }
    }

    function calculateCPO($sales)
    {
        foreach ($sales as $sale) {
            $orders = 0;
            $expences = 0;
            foreach ($sale->orders as $data) $orders += $data->total;
            foreach ($sale->expences as $data) $expences += $data->total;
            $cpo = $orders ? $expences / $orders : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'cpo', $cpo);
        }
    }

    function calculateCPA($sales)
    {
        foreach ($sales as $sale) {
            $orders = 0;
            $expences = 0;
            foreach ($sale->orders as $data) $orders += $data->total;
            foreach ($sale->expences as $data) $expences += $data->total;
            $cpa = $orders ? $expences / $orders : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'cpa', $cpa);
        }
    }

    function calculateCAC($sales)
    {
        foreach ($sales as $sale) {
            $visits = 0;
            $expences = 0;
            foreach ($sale->visits as $data) $visits += $data->total;
            foreach ($sale->expences as $data) $expences += $data->total;
            $cac = $visits ? $expences / $visits : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'cac', $cac);
        }
    }

    function calculateCPC($sales)
    {
        foreach ($sales as $sale) {
            $visits = 0;
            $expences = 0;
            foreach ($sale->visits as $data) $visits += $data->total;
            foreach ($sale->expences as $data) $expences += $data->total;
            $cpc = $visits ? $expences / $visits : 0;
            DataUtil::storeModelByDate('Measure', $sale->date, 'cpc', $cpc);
        }
    }
}
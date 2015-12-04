<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest):?>
    

    <?php
	// DataUtil::calculateCRS();
    $startdate = "2015-10-01";
    $enddate = "2015-11-01";
    $sales = DataUtil::getSalesByDates($startdate, $enddate);

    $indicatorValue = array();
    $labels = array();

    //$color = array("#69D7C6", "#7E4D76", "#000AAA", "#00115E","#7722FF", "#DD0D76", "#F9995E","#6999C6", "#AA0076");
    $color = array(
        "253,98,94",
        "105,215,198",
        "175,171,152",
        "126,77,118",
        "198,94,126",
        "145,198,175",
        "100,152,105",
        "77,118,130",
    );

    DataUtil::calculateEPC($sales);
    DataUtil::calculateCRS($sales);
    DataUtil::calculateARPU($sales);
    DataUtil::calculateLTV($sales);
    DataUtil::calculateIncome($sales);
    DataUtil::calculateROI($sales);
    DataUtil::calculateCPO($sales);
    DataUtil::calculateCPA($sales);
    DataUtil::calculateCAC($sales);
    DataUtil::calculateCPC($sales);

    $categories = Category::model()->findAll();
    //$category=Category::model()->find("id=4 OR id=6");
    //$indicators = $category->indicators;
    $indicators = Indicator::model()->findAll("category_id=4 OR category_id=6");
    $periods = Period::model()->findAll();
    $measures = Measure::model()->findAll();
    $platforms = Platform::model()->findAll();

    foreach ($indicators as $indicator) $indicatorValue[$indicator->id] = array();
    foreach ($sales as $sale) {
        array_push($labels, $sale->date);
        foreach ($indicators as $indicator) {
            array_push($indicatorValue[$indicator->id], DataUtil::getIndicatorValue($indicator, $sale));
        }
    }


    ?>


<div class="main-graphic">
    <div class="data-type">
    <p><b>Левая Y:</b></p>
    <?php $category=Category::model()->findByPk(4); $i=0; ?>
    <?php foreach ($category->indicators as $indicator): ?>
        <style>
            .main-graphic .indicator<?=@$i?>{border-width: 1px; border-style: solid;  margin-bottom: 15px; text-align: center; padding: 7px; cursor: pointer; font-weight: 300}
            .main-graphic .indicator<?=@$i?>:hover{}
            .data-type .indicator<?=@$i?>{color:rgba(<?=@$color[$i]?>,1); border-color: rgba(<?=@$color[$i]?>,1) }
            .data-type .indicator<?=@$i?>:hover{background-color: rgba(<?=@$color[$i]?>,.5);color: white }
            .data-type .indicator<?=@$i?>.active{background-color: rgba(<?=@$color[$i]?>,1) ;color: white }
        </style>
        <div class="indicator<?=$i?> active" onclick="indicatorClick(this, <?=$i++?>)"><?=$indicator->name?></div>
    <?php endforeach?>
    </div>

    <div class="center-graphic">
        <canvas id="canvas"></canvas>
    </div>

    <div class="data-type">
        <p><b>Правая Y:</b></p>
        <?php $category=Category::model()->findByPk(6); ?>
        <?php foreach ($category->indicators as $indicator): ?>
            <style>
                .main-graphic .indicator<?=@$i?>{border-width: 1px; border-style: solid;  margin-bottom: 15px; text-align: center; padding: 7px; cursor: pointer; font-weight: 300}
                .main-graphic .indicator<?=@$i?>:hover{}
                .data-type .indicator<?=@$i?>{color:rgba(<?=@$color[$i]?>,1); border-color: rgba(<?=@$color[$i]?>,1) }
                .data-type .indicator<?=@$i?>:hover{background-color: rgba(<?=@$color[$i]?>,.5);color: white }
                .data-type .indicator<?=@$i?>.active{background-color: rgba(<?=@$color[$i]?>,1) ;color: white }
            </style>
            <div class="indicator<?=$i?> active" onclick="indicatorClick(this, <?=$i++?>)"><?=$indicator->name?></div>
        <?php endforeach?>
    </div>

    <div class="data-type">
    <p><b>Плтаформы:</b></p>
    <?php foreach ($platforms as $platform): ?>
        <div class="indicator" onclick="platformClick(this, <?=$i?>)"><?=$platform->name?></div>
    <?php endforeach?>
    </div>
    <div class="date-type">
    <p><b>Периоды:</b></p>
    <?php foreach ($periods as $period): ?>
        <div class="indicator" onclick="periodClick(this, <?=$i?>)"><?=$period->name?></div>
    <?php endforeach?>
</div>
<div class="clear"></div>
    <?php include( Yii::getPathOfAlias( 'ext.ChartData').'.php' ); ?>
    <div class="extend-data">

    <p><b>Табличные данные:</b></p>

    <table><tr><th>№</th><th>Показатель</th><th>Значение</th></tr>
        <?php $category=Category::model()->findByPk(5) ?>
        <?php foreach ($category->indicators as $indicator): ?>
            <tr>
                <th><?=$indicator->id?></th>
                <th><?=$indicator->name?></th>
                <th><?=DataUtil::getValuebySales($sales,
                            DataUtil::getTableFromFormula($indicator->value),
                            DataUtil::getFieldFromFormula($indicator->value));
                    ?></th>
            </tr>
        <?php endforeach?>

    </table>
</div>

<?php else : ?>
    <h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    <h4>Пожалуйста авторизуйтесь</h4>
<?php endif?>


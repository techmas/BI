<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest):?>
    <h1 class="header-cat-name">ПАНЕЛЬ УПРАВЛЕНИЯ</h1>

    <?php
    $categories = Category::model()->findAll();
    $indicators = Indicator::model()->findAll();

    $startdate = "2015-10-01";
    $enddate = "2015-11-01";
    $sales = DataUtil::getSalesByDates($startdate, $enddate);
    $indicators = Indicator::model()->findAll();
    $indicatorValue = array();
    $labels = array();

    foreach ($indicators as $indicator) $indicatorValue[$indicator->id] = array();
    foreach ($sales as $sale) {
        array_push($labels, $sale->date);
        foreach ($indicators as $indicator) {
            array_push($indicatorValue[$indicator->id], DataUtil::getIndicatorValue($indicator, $sale));
        }
    }
    ?>

    <h1 class="header-cat-name">ПАНЕЛЬ УПРАВЛЕНИЯ</h1>

    <?php foreach ($categories as $category): ?>
        <div class="category"><b><?=$category->name?></b></div>
        <?php foreach ($category->indicators as $indicator): ?>
            <div class="indicator"><?=$indicator->name?></div>
        <?php endforeach?>
    <?php endforeach?>

    <div class="col2">
        <canvas id="canvas"></canvas>
    </div>


    <script>
        var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
        var lineChartData = {
            labels : <?=json_encode($labels)?>,
            datasets : [
                <?php foreach ($indicators as $indicator): ?>
                {
                    label: "My First dataset",
                    fillColor : "rgba(<?=$indicator->id*50?>,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : <?php echo json_encode($indicatorValue[$indicator->id]); ?>
                },
                <?php endforeach?>
            ]
        }

        window.onload = function(){
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData, {
                responsive: true
            });

        }
    </script>

<?php else : ?>
    <h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    <h4>Пожалуйста авторизуйтесь</h4>
<?php endif?>


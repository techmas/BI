<script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
        labels : <?=json_encode($labels)?>,
        datasets: [
            <?php $indicators = Category::model()->findByPk(4)->indicators; $n=0; ?>
            <?php foreach ($indicators as $indicator): ?>
            {
                yAxisID: "y-axis-1",
                label: "<?=$indicator->name?>",
                type: "<?=$indicator->type ? "bar" : "line"?>",
                backgroundColor : "rgba(<?=@$color[$n]?>,.4)",
                data : <?php echo json_encode($indicatorValue[$indicator->id]); @$n++; ?>
            },
            <?php endforeach?>
            <?php $indicators = Category::model()->findByPk(6)->indicators; ?>
            <?php foreach ($indicators as $indicator): ?>
            {
                yAxisID: "y-axis-2",
                label: "<?=$indicator->name?>",
                type: "<?=$indicator->type ? "bar" : "line"?>",
                backgroundColor : "rgba(<?=@$color[$n]?>,.4)",
                data : <?php echo json_encode($indicatorValue[$indicator->id]); @$n++; ?>
            },
            <?php endforeach?>
        ],
    }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, {
            type: 'bar',
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'label',

                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [
                        {
                            display: true,
                            type: "linear",
                            id: "y-axis-1",
                            gridLines: {
                                show: false,
                            }
                        },
                        {
                            display: true,
                            position: "right",
                            type: "linear",
                            id: "y-axis-2",
                            gridLines: {
                                show: false,
                                drawOnChartArea: false,
                            }
                        }
                    ]
                }
            }
        });

    }
</script>
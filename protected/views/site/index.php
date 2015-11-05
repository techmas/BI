<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if(!Yii::app()->user->isGuest):?>

<canvas id="canvas"></canvas>
<script type="text/javascript">
		var doughnutData = [
				{
					value: 310,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Первое"
				},
				{
					value: 40,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Второе"
				},
				{
					value: 90,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Третье"
				},
				{
					value: 50,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Четвертое"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Пятое"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};



</script>
    <?php else : ?>
    <p>Пожалуйста авторизуйтесь</p>
<?php endif?>


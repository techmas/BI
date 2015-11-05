<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if(!Yii::app()->user->isGuest):?>
<h1 class="header-cat-name">ПАНЕЛЬ УПРАВЛЕНИЯ</h1>
<div class="dash1">
<h1>Переходы поисковых систем</h1>
<a class="settings" href="#">настройка</a>
<div class="date-order">Данные за <a href="#">11.12.2014-11.09.2015</a></div>
	<div class="col1">
		<button class="active">Analytic</button>
		<button>Metrica</button>
		<button>Live</button>
<ul>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam me.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam me.<span>211\3000</span></li>
    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam me.<span>211\3000</span></li>
</ul>


	</div>
	<div class="col2">
		<canvas id="canvas"></canvas>
	</div>
<div class="clear"></div>



<div class="over"><a href="#">Развернуть отчет</a></div>
<div class="clear"></div>
</div>


<div class="dash2">
<h1>Данные эффективности</h1>
<a class="settings" href="#">настройка</a>
<div class="date-order">Данные за <a href="#">11.12.2014-11.09.2015</a></div>

	<div class="round-sheme">
	<h4>Показатель переходов</h4>
		<a href="#" class="close"></a>
	<canvas id="effect-round"></canvas>
	<ul>
	    <li>Google</li>
	    <li>Yandex</li>
	    <li>Organic</li>
	</ul>
	<button>Подробнее</button>
	</div>
	<div class="round-sheme">
	<h4>Время присутствия</h4>
		<a href="#" class="close"></a>
	<canvas id="time-round"></canvas>
	<ul>
	    <li>Google</li>
	    <li>Yandex</li>
	    <li>Organic</li>
	</ul>
	<button>Подробнее</button>
	</div>
	<div class="round-sheme">
	<h4>Глубина просмотра</h4>
		<a href="#" class="close"></a>
	<canvas id="deep-round"></canvas>
	<ul>
	    <li>Больше 10</li>
	    <li>Меньше 10</li>
	</ul>
	<button>Подробнее</button>
	</div>


</div>
<div class="clear"></div>
<div class="over"></div>

<div class="dash3">
<h1>Данные индексации</h1>
<a class="settings" href="#">настройка</a>
<ul>
    <li>12 ошибок индексации</li>
    <li>97 индексированно</li>
    <li>76 нужно оптимизировать</li>
</ul>

	<button>Подробнее</button>
</div>
<div class="clear"></div>

<div class="dash-information">
<h1>Справочная информация</h1>
<a class="settings" href="#">настройка</a>
<div class="info-block">
	<a href="#" class="close"></a>
<h3>Повышение эффективности анализа</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam metus, vitae suscipit odio semper sit amet. Aenean sit amet sollicitudin dolor. Nunc at dui ligula, vitae facilisis turpis. Sed turpis sem, ultricies vel ullamcorper id, egestas sed tortor. Aliquam vel mollis neque. Fusce consequat vestibulum augue ac sagittis.</p>
<button>Узнать</button>
</div>

<div class="info-block">
	<a href="#" class="close"></a>
<h3>Инструменты для контроля входа</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam metus, vitae suscipit odio semper sit amet. Aenean sit amet sollicitudin dolor. Nunc at dui ligula, vitae facilisis turpis. Sed turpis sem, ultricies vel ullamcorper id, egestas sed tortor. Aliquam vel mollis neque. Fusce consequat vestibulum augue ac sagittis.</p>
<button>Узнать</button>
</div>

<div class="info-block">
	<a href="#" class="close"></a>
<h3>Эффективная индексация</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi feugiat rutrum ultrices. Nam pellentesque aliquam metus, vitae suscipit odio semper sit amet. Aenean sit amet sollicitudin dolor. Nunc at dui ligula, vitae facilisis turpis. Sed turpis sem, ultricies vel ullamcorper id, egestas sed tortor. Aliquam vel mollis neque. Fusce consequat vestibulum augue ac sagittis.</p>
<button>Узнать</button>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var lineChartData = {
		labels : ["Январь","Февраль","Март","Апрель","Май","Июнь","Июль"],
		datasets : [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				label: "My Second dataset",
				fillColor : "rgba(151,187,205,0.2)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]
	}


		var doughnutData1 = [
				{
					value: 300,
					color:"#FD625E",
					highlight: "#FD817E",
					label: "Google"
				},
				{
					value: 50,
					color: "#69D7C6",
					highlight: "#87DFD1",
					label: "Yandex"
				},
				{
					value: 100,
					color: "#7E4D76",
					highlight: "#987191",
					label: "Organic"
				},
			];

		var doughnutData2 = [
				{
					value: 300,
					color:"#FD625E",
					highlight: "#FD817E",
					label: "Google"
				},
				{
					value: 50,
					color: "#69D7C6",
					highlight: "#87DFD1",
					label: "Yandex"
				},
				{
					value: 100,
					color: "#7E4D76",
					highlight: "#987191",
					label: "Organic"
				},
			];

		var doughnutData3 = [
				{
					value: 300,
					color:"#FD625E",
					highlight: "#FD817E",
					label: "Больше 10"
				},
				{
					value: 50,
					color: "#69D7C6",
					highlight: "#87DFD1",
					label: "Меньше 10"
				},
			];

window.onload = function(){
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myLine = new Chart(ctx).Line(lineChartData, {
		responsive: true
	});

	var ctx = document.getElementById("effect-round").getContext("2d");
	window.myDoughnut = new Chart(ctx).Doughnut(doughnutData1, {responsive : true});
	
	var ctx = document.getElementById("time-round").getContext("2d");
	window.myDoughnut = new Chart(ctx).Doughnut(doughnutData2, {responsive : true});
	
	var ctx = document.getElementById("deep-round").getContext("2d");
	window.myDoughnut = new Chart(ctx).Doughnut(doughnutData3, {responsive : true});

}
</script>

    <?php else : ?>
    <h1>Добро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    <h4>Пожалуйста авторизуйтесь</h4>


<?php endif?>


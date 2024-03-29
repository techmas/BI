<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>


    <div id="header">
		<a href="/" style="text-decoration:none"><div id="logo">Мета<b>Аналитика</b></div></a>
	
	<div id="user-personal">
		<?php $this->widget('zii.widgets.CMenu',array(
		'items'=>array(
            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
		)); ?>
	</div>
	</div>
	<div id="main-menu">
		<?php
        $categories = Category::model()->findAll();
        $items = array();
        foreach ($categories as $category) {
            array_push($items, array(
                    'label'=>$category->name,
                    'url'=>'index.php?r=category/show&id='.$category->id,
                    'visible'=>!Yii::app()->user->isGuest)

            );
        }
        $this->widget('zii.widgets.CMenu',array(
			'items'=> $items
                /*array(
				array('label'=>'Учетные данные', 'url'=>array('/commodity/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Веб-аналитика', 'url'=>array('/visits/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Доходность', 'url'=>array('/commodity/epc'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Администрирование', 'url'=>array('/import/import'), 'visible'=>!Yii::app()->user->isGuest),
 			    ),*/
		    ));
        ?>
	</div>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>


</div><!-- page -->

<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Мета<b>Аналитика</b>
</div><!-- footer -->

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Chart-2.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>

</body>
</html>


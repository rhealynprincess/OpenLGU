
<?php
date_default_timezone_set('Asia/Manila');

$script_tz = date_default_timezone_get();

/*if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}
*/
?>


<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Register', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
				
				//ADMIN
				array('label'=>'Taxpayers', 'url'=>array('taxpayer/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='ADMIN')),
				array('label'=>'Businesses', 'url'=>array('business/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='ADMIN')),
				
				//REGISTERED
				array('label'=>'My Profile', 'url'=>array('taxpayer/profile'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='REGISTERED')),
				array('label'=>'My Businesses', 'url'=>array('business/index', 'id'=>Yii::app()->user->id), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='REGISTERED')),
				
				//BPLO
				array('label'=>'Businesses', 'url'=>array('business/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='BPLO')),
				
				array('label'=>'Businesses', 'url'=>array('business/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='ASSESSOR')),
				array('label'=>'Businesses', 'url'=>array('business/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='TREASURY')),
				array('label'=>'Businesses', 'url'=>array('business/admin'), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->role=='LCE')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>

		<div style='float:right;margin-top:-24px;'><a href='../../OpenLGU'><img src="../Bpls/images/home.jpg" alt="OpenLGU" width="23" height="23">  </a></div>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Cristina Amor C. Gatbonton<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

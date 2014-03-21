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

	<?php 
		if(Yii::app()->user->checkAccess('admin'))
		$role = 'admin';
		else if(Yii::app()->user->checkAccess('bacUser'))
		$role = 'BAC member';		
		else if(Yii::app()->user->checkAccess('bacSec'))
		$role = 'BAC secretariat';
		else if(Yii::app()->user->checkAccess('bacChair'))
		$role = 'BAC chairman';
		else if(Yii::app()->user->checkAccess('LCE'))
		$role = 'Local Chief Executive';
		else if(Yii::app()->user->checkAccess('privateUser'))
		$role = 'bidder';
		else if(Yii::app()->user->checkAccess('authenticated'))
		$role = 'authenticated';
		else
		$role = 'guest';
	?>
	
	
	<div id="mainmenu">
	
	
		<?php 
		if(Yii::app()->user->checkAccess('guest')|| Yii::app()->user->checkAccess('privateUser')){
			$this->widget('zii.widgets.CMenu',array(
		
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Invitations', 'url'=>array('/invitation/index')),
				array('label'=>'Awards', 'url'=>array('/award/index')),
				//array('label'=>'Users', 'url'=>array('/user/index')),
				array('label'=>'BAC', 'url'=>array('/user/indexBac')),
				//array('label'=>'Private Users', 'url'=>array('/userPrivate/index')),
				//array('label'=>'Try', 'url'=>array('/invitation/try')),
				 array('label'=>'LGU', 'url'=>array('/site/lgu')),
				// array('label'=>'Report', 'url'=>array('/site/report')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.' '.$role.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		
			)); 
		} 
		else if(Yii::app()->user->checkAccess('bacSec')||Yii::app()->user->checkAccess('bacUser')||Yii::app()->user->checkAccess('admin')||Yii::app()->user->checkAccess('authenticated')){
			$this->widget('zii.widgets.CMenu',array(
		
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Invitations', 'url'=>array('/invitation/index')),
				array('label'=>'Awards', 'url'=>array('/award/index')),
				array('label'=>'Users', 'url'=>array('/user/index')),
				array('label'=>'BAC', 'url'=>array('/user/indexBac')),
				//array('label'=>'Private Users', 'url'=>array('/userPrivate/index')),
				//array('label'=>'Try', 'url'=>array('/invitation/try')),
				 array('label'=>'LGU', 'url'=>array('/site/lgu')),
				// array('label'=>'Report', 'url'=>array('/site/report')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.' '.$role.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		
			)); 
		} 
		
	
		
		?>
	

		<div style='float:right;margin-top:-24px;'><a href='../../OpenLGU'><img src="../Procurement/images/home.jpg" alt="OpenLGU" width="23" height="23">  </a></div>
	</div><!-- mainmenu -->
	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>

	</div><!-- footer -->
</div><!-- page -->

</body>
</html>

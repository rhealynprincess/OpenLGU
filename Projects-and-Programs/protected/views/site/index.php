<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/cycle-plugin.js", CClientScript::POS_HEAD);

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/show-info.js", CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript('slide',"
	$('#banner').cycle();
");


?>


<div id='left_banner'>
<div id='banner'>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images2.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images3.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images4.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images5.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images6.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images7.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images8.jpeg"/>
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/images9.jpeg"/>
  <img src="<?php echo Yii::app()->request->baseUrl;?>/images/images10.jpeg"/>
</div>


<div id='intro'>
	<h1>&nbsp;&nbsp;&nbsp;WELCOME!</h1>
	<div id='information'>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Project and Program Monitoring System of the 	Municipality of Los Banos, Laguna. This application enables the users to view the status of the projects and programs implemented by the different departments of the local government unit and provide feedback for a certain project or program. The project implementors for each department can also upload reports to be download by the head of Municipal Planning and Development Office for consolidation of reports.
	</div>
</div>


</div>
	<?php $this->beginWidget('zii.widgets.CPortlet', array(
				
			)); ?>
<div id='department' class='sectors'>
	<ul>
	<li><a href="#department" onclick="info1()">Municipal Planning and Development Office</a></li>
	<li><a href="#department" onclick="info2()">Office of the Municipal Engineer</a></li>
	<li><a href="#department" onclick="info3()">Municipal Health Office</a></li>
	<li><a href="#department" onclick="info4()">Municipal Agriculture Office</a></li>
	<li><a href="#department" onclick="info5()">Office of the Civil Registrar</a></li>
	<li><a href="#department" onclick="info6()">Municipal Social Welfare and Development Office</a></li>
	<li><a href="#department" onclick="info7()">Public Employment and Service Office</a></li>
	<li><a href="#department" onclick="info8()">Municipal Environment and Natural Resources Office</a></li>
	<li><a href="#department" onclick="info9()">Municipal Scholarship Program</a></li>
	<li><a href="#department" onclick="info10()">Gender and Development Office</a></li>
	<li><a href="#department" onclick="info11()">Municipal Sports Development Office</a></li>
	</ul>

</div>
	<?php $this->endWidget(); ?>








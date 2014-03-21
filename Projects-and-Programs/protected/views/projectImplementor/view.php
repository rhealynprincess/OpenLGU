<div id='enlarge_panel' style='display:none;'>
	<button onclick=close_enlarge() style='float:right;font-size:30px;text-decoration:none;margin-right:3%;margin-top:2%;'> X </button>
	<div id='enlarge_photo'>

	</div>
</div>

<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

/*if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>

<?php
/* @var $this ProjectImplementorController */
/* @var $model ProjectImplementor */



$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('projectImplementor/index')),
'links' => array(
			"Project/Program No. ".$model->project_program_no,
		),
));

/*$this->breadcrumbs=array(
	'Project Implementors'=>array('index'),
	$model->project_program_no,
);
*/
if(Yii::app()->user->getState("user_role")=="admin"){
		$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('index')),
	array('label'=>'Create Project/Program', 'url'=>array('create')),
	array('label'=>'Update Project/Program', 'url'=>array('update', 'id'=>$model->project_program_no)),
	array('label'=>'Delete Project/Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->project_program_no),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project/Program', 'url'=>array('admin')),
);
	}
else{
$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('index')),
	array('label'=>'Create Project/Program', 'url'=>array('create')),
	//array('label'=>'Update Project/Program', 'url'=>array('update', 'id'=>$model->project_program_no)),
	//array('label'=>'Delete Project/Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->project_program_no),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Project/Program', 'url'=>array('admin')),
);
}
?>

<!--<h1>Project/Program #<?php echo $model->project_program_no; ?></h1>-->


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'project_program_no',
		'project_program_title',
		'cost',
		'location',
		//'source_of_fund',
		'date_started',
		'date_completed',
		'due_date',
		'status',
		'contractor',
		'sector',
		'remarks',
	),
)); ?>

<div id='add_photo'>
	<?php $url='index.php?r=projectImplementor/addphoto';?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>CHtml::normalizeUrl('index.php?r=projectImplementor/addphoto&id='.$model->project_program_no),
	'id'=>'project-implementor-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
			'enctype'=>'multipart/form-data',
			),
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'Project/Program_no'); ?>
		<?php echo $form->textField($model,'project_program_no'); ?>
		<?php echo $form->error($model,'project_program_no'); ?>
	</div>-->
	
	<div class="row">
        <?php echo $form->labelEx($model,'Add Photo'); ?>
        <?php echo CHtml::activeFileField($model, 'image', array('required'=>'required')); ?> 
        <?php echo $form->error($model,'image'); ?>
</div>
	<div class='row'>
		<?php echo $form->textField($model,'project_program_title',array('size'=>60,'maxlength'=>200, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'project_program_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'cost', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'location', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'source_of_fund',array('size'=>60,'maxlength'=>100, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'source_of_fund'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'date_started', array('hidden'=>'hidden')); ?>		
		<?php echo $form->error($model,'date_started'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'date_completed', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'date_completed'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'due_date', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

		<div class="row">
		<?php echo $form->textField($model,'status', array('hidden'=>'hidden')); ?>
	</div>


	<div class="row">
		<?php echo $form->textField($model,'contractor', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'contractor'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model,'sector', array('hidden'=>'hidden')); ?>
		<?php //echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'remarks',array('size'=>60,'maxlength'=>100, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Add'); ?>
	</div>


<?php $this->endWidget(); ?>

</div>

<div id="project_photo">

	<?php /*  if($model->image != "" ) echo "<img src='".Yii::app()->request->baseUrl."/images/".$model->image."'/>";
			else echo "<img src='".Yii::app()->request->baseUrl."/images/default.jpg'/>";

 */ ?>
<?php
	$this->widget('ext.carouFredSel.ECarouFredSel', array(
    'id' => 'carousel',
    'target' => '#slider',
    'config' => array(
				'auto' => false,
				'circular' => false,
				'infinite' => false,
				'prev' => '#slider_prev',
				'next' => '#slider_next',
        'items' => 5,
        'scroll' => 1,
    ),
));	
?>
<?php

	$images=explode("//", $model->image);
	//print_r($images);
?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/enlarge.js", CClientScript::POS_HEAD);

?>


<div class="list_carousel">
	<ul id="slider" >
	<?php
	foreach($images as $element){
	$image_address=Yii::app()->request->baseUrl . '/images/'.$element;
	echo "<li onclick='enlarge(".'"'.$image_address.'"'.")'>";
	echo  CHtml::image(Yii::app()->request->baseUrl . '/images/'.$element, 'image',array());
	echo "</li>";
	}
?>
	</ul>
	<div class="clearfix"></div>
	<a class="prev_button" id="slider_prev" href="#"><span><</span></a>
	<a class="next_button" id="slider_next" href="#"><span>></span></a>
</div>
</div>


<div id="comments">
		<div id='comment_header'>Comments</div>

<?php 
	  $criteria=new CDbCriteria();
		$criteria->addInCondition('project_program_no', array($model->project_program_no));
		$criteria->order='date desc';
    $count=Comment::model()->count($criteria);
    $pages=new CPagination($count);

    // results per page
    $pages->pageSize=4;
    $pages->applyLimit($criteria);
		$models=Comment::model()->findAll($criteria);
		foreach($models as $comment){
		if($comment->approved=="yes"){
			echo "<div class='entry'>";
			echo "<div class='user'>by: <span >{$comment->user}</span></div>";
			echo "<div class='content'> {$comment->content}</div>";
			$exact=explode(".", $comment->date);
			echo "<div class='date'> {$exact[0]}</div>";
		echo "</div>";
}
		}

   //echo print_r($models);
	//echo $models->id;

$this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>CHtml::normalizeUrl('index.php?r=comment/create'),
	'id'=>'comment-form',
	'method'=>'post',
	'enableAjaxValidation'=>false,
)); ?>

<div class="entry_new">
	<?php echo $form->errorSummary(Comment::model()); ?>
	<?php if(Yii::app()->user->isGuest)
	echo "<div class='user'>by: <span >Anonymous</span></div>";
	else{
	$name=Yii::app()->user->getState('user_first_name')." ".Yii::app()->user->getState('user_middle_name')." ".Yii::app()->user->getState('user_last_name');
	$sector=" (".Yii::app()->user->getState('user_sector')." )";
		echo "<div class='user'>by: <span >{$name}</span>{$sector}</div>";
}
?>
<div class="row">
		<?php echo $form->textField(Comment::model(),'project_program_no', array('value'=>$model->project_program_no, 'hidden'=>'hidden')); ?>
		<?php echo $form->error(Comment::model(),'project_program_no'); ?>
	</div>
	
	
<div class="row">
		<?php echo $form->textField(Comment::model(),'project_program_title', array('value'=>$model->project_program_title, 'hidden'=>'hidden')); ?>
		<?php echo $form->error(Comment::model(),'project_program_title'); ?>
	</div>

	<div class="content">
		<?php echo $form->textarea(Comment::model(),'content',array('rows'=>3, 'cols'=>70,'maxlength'=>180,'required'=>'required')); ?>
		<?php echo $form->error(Comment::model(),'content'); ?>
	</div>

	<div class="row">
		<?php $date=getdate(date("U"));
		$current=$date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];?>
		<?php echo $form->textField(Comment::model(),'date', array('hidden'=>'hidden', 'value'=>$current)); ?>
		<?php echo $form->error(Comment::model(),'date'); ?>
	</div>

	<div class="row">
	
		<?php if(Yii::app()->user->isGuest)echo $form->textField(Comment::model(),'user', array('value'=>'Anonymous','hidden'=>'hidden', )); 
		else{
		
				echo $form->textField(Comment::model(),'user', array('value'=>$name.$sector,'hidden'=>'hidden', )); 
		}
?>
		<?php echo $form->error(Comment::model(),'user'); ?>
	</div>

	<div class="row buttons" style="margin-left:70%;">
		<?php echo CHtml::submitButton(Comment::model()->isNewRecord ? 'Create' : 'Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>

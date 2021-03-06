<?php
/* @var $this MayorController */
/* @var $model Mayor */

/*$this->breadcrumbs=array(
	'Mayors'=>array('index'),
	$model->project_program_no,
);*/

$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('index')),
	array('label'=>'View Reports', 'url'=>array('report/index')),
	//array('label'=>'Update Mayor', 'url'=>array('update', 'id'=>$model->project_program_no)),
	//array('label'=>'Delete Mayor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->project_program_no),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Mayor', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'project_program_title',
		'cost',
		'location',
		'source_of_fund',
		'date_started',
		'date_completed',
		'due_date',
		'status',
		'contractor',
		'sector',
		'remarks',
		'project_program_no',
	),
)); ?>


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
			echo "<div class='entry'>";
			echo "<div class='user'>by: <span >{$comment->user}</span></div>";
			echo "<div class='content'> {$comment->content}</div>";
			$exact=explode(".", $comment->date);
			echo "<div class='date'> {$exact[0]}</div>";
		echo "</div>";
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

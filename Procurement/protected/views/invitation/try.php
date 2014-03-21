<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>test - try ko lang mga yii features</h2>
<?php 
echo '<br/><b>accordion</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        'panel 1'=>'content for panel 1',
        'panel 2'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
        //'panel 3'=>$this->renderPartial('_partial',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'animated'=>'bounceslide',
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Auto Complete</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'city',
    'source'=>array('ac1', 'ac2', 'ac3'),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Button</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiButton', array(
		'name'=>'submit',
		'caption'=>'Save',
		'options'=>array(
        'onclick'=>'js:function(){alert("Yes");}',
)));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>DatePicker</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiDatePicker', array(
		   'name'=>'publishDate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Dialog</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Dialog box 1',
        'autoOpen'=>false,
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Draggable</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiDraggable', array(
    // additional javascript options for the draggable plugin
    'options'=>array(
        'scope'=>'myScope',
    ),
));
    echo 'Your draggable content here';
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Droppable</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiDroppable', array(
    // additional javascript options for the draggable plugin
    'options'=>array(
        'scope'=>'myScope',
    ),
));
    echo 'Your droppable content here';
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Sortable</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiSortable', array(
    'items'=>array(
        'id1'=>'Item 1',
        'id2'=>'Item 2',
        'id3'=>'Item 3',
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
        'delay'=>'300',
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Selectable</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiSelectable', array(
    'items'=>array(
        'id1'=>'Item 1',
        'id2'=>'Item 2',
        'id3'=>'Item 3',
    ),
    // additional javascript options for the selectable plugin
    'options'=>array(
        'delay'=>'300',
    ),
));
?>
<?php $this->endWidget(); ?>


<?php 
echo '<br/><b>Tabs</b><br/>';
$this->beginWidget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'StaticTab 1'=>'Content for tab 1',
        'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
        'StaticTab 3'=>array('ajax'=>'index.php?r=userBac/create'),
        // panel 3 contains the content rendered by a partial view
        //'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>
<?php $this->endWidget(); ?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invitation-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php $this->endWidget(); ?>
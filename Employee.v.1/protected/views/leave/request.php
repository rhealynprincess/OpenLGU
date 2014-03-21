<?php
/**
 * Leave Request page to file leave requests as well as view approved/rejected requests.
 *
 * @package EmployeeInformationSystem
 * @subpackage Leave
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this LeaveController */
/* @var $model Leave */

$this->pageTitle = Yii::app()->name . ' - Leave of Abscence';

$this->breadcrumbs = array(
    'Profile'=>array('site/profile'),
    'Leave of Abscence',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
    $('.list').click(function(){
        $('.list-form').toggle('');
        return false;
    });
");
?>

<h1>Leave of Abscence</h1>

<p>Please include the following requirements in the attachment:</p>
<ul>
    <li>Medical Certificate, if needed</li>
    <li>Clearance on Property Accountabilities, if needed</li>
    <li>Letter of Endorsement, if needed</li>
</ul>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'leave-dialog',
    'options'=>array(
        'title'=>'Leave Request',
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();

echo CHtml::button('View Approved/Rejected Leaves', array('class'=>'list'));
echo '<div class="list-form" style="display:none">';
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'leave-table',
    'dataProvider'=>$model->getApprovedLeaves(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'leaveName',
        array(
            'name'=>'date_from',
            'value'=>'($data->date_from) ? date("m/d/Y", strtotime($data->date_from)) : null',
        ),
        array(
            'name'=>'date_to',
            'value'=>'($data->date_to) ? date("m/d/Y", strtotime($data->date_to)) : null',
        ),        
        'days',
        'head_status',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("leave/view", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#leave-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("open");
                        });
                        return false;
                    }'
                ),
            ),
        ),
    ),
));
echo '</div><!-- list-form -->';
?>
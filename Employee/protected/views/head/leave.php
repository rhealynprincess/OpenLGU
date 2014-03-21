<?php
/**
 * Pending Leaves page to approve/reject pending requests.
 *
 * @package EmployeeInformationSystem
 * @subpackage DepartmentHead
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HeadController */

$this->pageTitle = Yii::app()->name . ' - Pending Leaves';
$this->breadcrumbs = array(
    'Department Head'=>array('/head'),
    'Pending Leaves',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=head]').parent().addClass('active');
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Pending Leaves</h1>

<div class="notice">
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}
?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'leave-table',
    'dataProvider'=>$model->getPendingLeaves(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'fullName',
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
        array(
            'name'=>'attachment',
            'type'=>'raw',
            'htmlOptions'=>array('class'=>'button-column'),
            'value'=>'($data->attachment) ? CHtml::imageButton(
                                                Yii::app()->request->baseUrl . "/images/download.png",
                                                array(
                                                    "submit"=>array("document/download", "id"=>$data->attachment),
                                                    "confirm"=>"Are you sure you want to download this file?",
                                                )
                                            )
                                          : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("leave/update", array("id"=>$data->primaryKey))',
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

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'leave-dialog',
    'options'=>array(
        'title'=>'Pending Leave',
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>
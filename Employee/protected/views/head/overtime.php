<?php
/**
 * Pending Overtimes page to approve/reject pending requests.
 *
 * @package EmployeeInformationSystem
 * @subpackage DepartmentHead
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HeadController */

$this->pageTitle = Yii::app()->name . ' - Pending Overtimes';
$this->breadcrumbs = array(
    'Department Head'=>array('/head'),
    'Pending Overtimes',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=head]').parent().addClass('active');
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Pending Overtimes</h1>

<div class="notice">
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}
?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'overtime-table',
    'dataProvider'=>$model->getPendingOvertimes(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'details',
        array(
            'name'=>'time',
            'value'=>'($data->time) ? date("m/d/Y H:i:s", strtotime($data->time)) : null',
        ),
        array(
            'name'=>'request_date',
            'value'=>'($data->request_date) ? date("m/d/Y", strtotime($data->request_date)) : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("overtime/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#overtime-dialog").load($(this).attr("href"), function(){
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
    'id'=>'overtime-dialog',
    'options'=>array(
        'title'=>'Pending Overtime',
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
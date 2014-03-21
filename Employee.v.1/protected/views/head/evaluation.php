<?php
/**
 * Performance Evaluation Review page to download all evaluation forms under the department.
 *
 * @package EmployeeInformationSystem
 * @subpackage DepartmentHead
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HeadController */

$this->pageTitle = Yii::app()->name . ' - Performance Evaluation';
$this->breadcrumbs = array(
    'Department Head'=>array('/head'),
    'Performance Evaluation',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=head]').parent().addClass('active');
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Performance Evaluation</h1>

<div class="notice">
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}
?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'evaluation-table',
    'dataProvider'=>$model->getPerformanceEvaluations(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'fullName',
        array(
            'name'=>'date',
            'value'=>'($data->date) ? date("m/d/Y", strtotime($data->date)) : null',
        ),
        'details',
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
                    'url'=>'Yii::app()->createUrl("evaluation/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#evaluation-dialog").load($(this).attr("href"), function(){
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
    'id'=>'evaluation-dialog',
    'options'=>array(
        'title'=>'Performance Evaluation',
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
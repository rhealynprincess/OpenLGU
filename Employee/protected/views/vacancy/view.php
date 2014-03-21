<?php
/**
 * Views an open Position along with its job applications.
 *
 * @package EmployeeInformationSystem
 * @subpackage Vacancy
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this VacancyController */

$this->pageTitle = Yii::app()->name . ' - Pending Applications';
$this->breadcrumbs = array(
    'Job Vacancies'=>array('/vacancy'),
    $model->title,
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=vacancy]').parent().addClass('active');
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Pending Applications for <?php echo $model->title; ?></h1>

<div class="notice">
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}
?>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'application-table',
    'dataProvider'=>$application->getPendingApplications($model->position_id),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'fullName',
        'currentPosition',
        array(
            'name'=>'application_date',
            'value'=>'($data->application_date) ? date("m/d/Y", strtotime($data->application_date)) : null',
        ),
        'requirement_status',
        'psb_status',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("application/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#application-dialog").load($(this).attr("href"), function(){
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
    'id'=>'application-dialog',
    'options'=>array(
        'title'=>'Pending Application',
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
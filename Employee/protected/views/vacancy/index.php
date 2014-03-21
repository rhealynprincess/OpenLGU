<?php
/**
 * Lists all open Positions.
 *
 * @package EmployeeInformationSystem
 * @subpackage Vacancy
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this VacancyController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Job Vacancies';
$this->breadcrumbs = array(
    'Job Vacancies',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>Vacant Positions as of <?php echo date('m/d/Y'); ?></h1>

<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div class='flash-$key'>$message</div>";
}

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'vacancy-dialog',
    'options'=>array(
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
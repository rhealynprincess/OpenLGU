<?php
/**
 * Performance Evaluation Upload page which allows users to attach uploaded evaluation exams.
 *
 * @package EmployeeInformationSystem
 * @subpackage Evaluation
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EvaluationController */
/* @var $model PerformanceEvaluation */

$this->pageTitle = Yii::app()->name . ' - Performance Evaluation';

$this->breadcrumbs = array(
    'Profile'=>array('site/profile'),
    'Performance Evaluation',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
");
?>

<h1>Performance Evaluation</h1>

<p>Please include the following requirements in the attachment:</p>
<ul>
    <li>Performance Evaluation for the respective Rating Period</li>
</ul>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));
?>
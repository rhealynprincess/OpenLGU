<?php
/**
 * Resignation Request page which requires an attached Letter of Resignation.
 *
 * @package EmployeeInformationSystem
 * @subpackage Resign
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this ResignController */
/* @var $model Resign */

$this->pageTitle = Yii::app()->name . ' - Resignation';

$this->breadcrumbs = array(
    'Profile'=>array('site/profile'),
    'Resignation',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
");
?>

<h1>Resignation</h1>

<p>Please include the following requirements in the attachment:</p>
<ul>
    <li>Letter of Resignation</li>
</ul>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));
?>
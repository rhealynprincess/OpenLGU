<?php
/**
 * Manage Departments index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Department
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DepartmentController */
/* @var $model Department */

$this->pageTitle = Yii::app()->name . ' - Manage Departments';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Department',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('department-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Departments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('_search', array(
    'model'=>$model,
));
echo '</div><!-- search-form -->';

echo CHtml::ajaxButton('Add Department', Yii::app()->createUrl('/department/create'),
    array('success'=>'function(data){
        $("#department-dialog").dialog("option", "title", "Add Department");
        $("#department-dialog").html(data).dialog("open");
    }')
);

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'department-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'department_id',
        'name',
        'fullName',
        'details',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
        ),
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'department-dialog',
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
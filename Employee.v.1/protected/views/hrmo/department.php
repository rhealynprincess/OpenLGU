<?php
/**
 * Department Overview page to list detailed information on all Departments in the LGU.
 *
 * @package EmployeeInformationSystem
 * @subpackage HRMO
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HrmoController */

$this->pageTitle = Yii::app()->name . ' - Department Overview';
$this->breadcrumbs = array(
    'Human Resource Management Officer'=>array('/hrmo'),
    'Department Overview',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=hrmo]').parent().addClass('active');
    $('.search').click(function()
    {
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function()
    {
        $.fn.yiiGridView.update('department-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Department Overview</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('../department/_search', array(
    'model'=>$model,
));
echo '</div><!-- search-form -->';

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
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("department/view", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#department-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "View Department");
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
    'id'=>'department-dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'maxheight'=>300,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>
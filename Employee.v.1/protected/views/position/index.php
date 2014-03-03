<?php
/**
 * Manage Positions index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Position
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this PositionController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Manage Positions';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Position',
);

$id = isset($_POST['id']) ? $_POST['id'] : 0;

Yii::app()->clientScript->registerScript('search', "
    if (" . $id . ") {
        $('#position-dialog').load($('a[href$=" . $id . "].update').attr('href'), function(){
            $(this).dialog('option', 'title', 'Update Position');
            $(this).dialog('open');
        });
    }
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('position-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Positions</h1>

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

echo CHtml::ajaxButton('Add Position', Yii::app()->createUrl('/position/create'),
    array('success'=>'function(data){
        $("#position-dialog").dialog("option", "title", "Add Position");
        $("#position-dialog").html(data).dialog("open");
    }')
);

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'position-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'position_id',
        'title',
        'departmentName',
        'role',
        'fullName',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("position/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#position-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Position");
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
    'id'=>'position-dialog',
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
<?php
/**
 * Manage Documents index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Document
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Manage Documents';
$this->breadcrumbs=array(
    'Admin'=>array('/admin'),
    'Document',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('document-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Documents</h1>

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

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'document-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'document_id',
        array(
            'name'=>'oldName',
            'header'=>'File',
        ),
        'fullName',
        'details',
        array(
            'name'=>'last_modified',
            'value'=>'($data->last_modified) ? date("m/d/Y H:i:s", strtotime($data->last_modified)) : null',
        ),
        array(
            'header'=>'Download',
            'type'=>'raw',
            'htmlOptions'=>array('class'=>'button-column'),
            'value'=>'CHtml::imageButton(
                Yii::app()->request->baseUrl . "/images/download.png",
                array(
                    "submit"=>array("document/download", "id"=>$data->primaryKey),
                    "confirm"=>"Are you sure you want to download this file?",
                )
            )',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
        ),
    ),
));
?>
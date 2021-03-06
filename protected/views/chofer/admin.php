<?php
/* @var $this ChoferController */
/* @var $model Chofer */

$this->breadcrumbs=array(
	'Chofers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Chofer', 'url'=>array('index')),
	array('label'=>'Create Chofer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#chofer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Consultar Choferes</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'chofer-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'id',
		'nombre',
		'cedula',
		'id_tipo_chofer',
		/*array(  
			'header'=>'Tipo de Chofer', 
			'value'=>'$data->idTipoChofer->tipo' 
		),*/
		'id_estatus_chofer',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>

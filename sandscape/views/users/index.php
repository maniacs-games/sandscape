<?php
$this->title = Yii::t('sandscape', 'Users');
?>

<h2><?php echo Yii::t('sandscape', 'User List'); ?></h2>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $filter->search(),
    'filter' => $filter,
    'template' => '{items} {pager} {summary}',
    'type' => 'striped condensed bordered',
    'columns' => array(
        array(
            'name' => 'name',
            'type' => 'html',
            'value' => 'CHtml::link($data->name, Yii::app()->createUrl("users/update", array("id" => $data->userId)))'
        ),
        'email:email',
        array(
            'name' => 'role',
            'filter' => User::rolesArray(),
            'type' => 'html',
            'value' => '$data->getRole()'
        ),
        array(
            'header' => Yii::t('sandscape', 'Actions'),
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 50px'),
        )
    ),
));

$this->widget('bootstrap.widgets.TbButton', array(
    'label' => Yii::t('sandscape', 'New User'),
    'type' => 'info',
    'size' => 'small',
    'url' => $this->createURL('users/create')
));

<?php
/** @var CountersController $this */
$this->title = Yii::t('sandscape', 'Edit Counter');
?>

<h2><?php echo Yii::t('sandscape', 'Edit Counter'); ?></h2>

<?php
echo $this->renderPartial('_form', array('counter' => $counter));

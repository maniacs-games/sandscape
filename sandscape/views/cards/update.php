<?php

/** @var CardsController $this */
$this->title = Yii::t('sandsacpe', 'Edit Card');

echo $this->renderPartial('_form', array('card' => $card));
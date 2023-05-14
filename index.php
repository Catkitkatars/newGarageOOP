<?php 
require_once 'database/DataHandler.php';
require_once 'widgets/WidgetCard.php';

$data = new DataHandler();

$widgetCard = new WidgetCard($data->getData());

?>
<h1>Garage</h1>
<a href="pages/addCard.php">Add New Car</a>
<div style="display: flex; gap: 10px; margin-top: 10px;"> 
  <?php $widgetCard->render(); ?>
</div> 



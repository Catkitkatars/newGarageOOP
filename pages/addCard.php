<h2>Add New Car</h2>

<?php 
require_once '../database/DataHandler.php';
require_once '../database/config.php';

$colunmName = new DataHandler(
    $arrayFromEnter['servername'],
    $arrayFromEnter['username'], 
    $arrayFromEnter['password'],
    $arrayFromEnter['dbname'],
    $arrayFromEnter['tableName'], 
);
?>
<form action="../requests/add.php" method="POST" >
<?php foreach($colunmName->getColumnNames() as $key => $value): ?>
    <?php if($value == 'id') continue;?>
    <label for=<?=htmlspecialchars($value)?>><?=htmlspecialchars(ucfirst($value))?></label></br>
    <input type="text" name=<?=htmlspecialchars($value)?>></br>
<?php endforeach ?> 
</br><button type='submit'>Add</button>
</form>
<?php

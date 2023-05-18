<h2>Edit Car</h2>

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

$placeholderData = $colunmName->getOneData();
$i = 0;
?>
<form action="../requests/edit.php?id=<?=$_GET['id']?>" method="POST" >

<?php foreach($colunmName->getColumnNames() as $key => $value): ?>
    <?php if($value == 'id') continue; $i++?>

    <label for=<?=htmlspecialchars($value)?>><?=htmlspecialchars(ucfirst($value))?></label></br>
    <input type="text" name=<?=htmlspecialchars($value)?> value="<?= $placeholderData[$i] ?>"></br>
<?php endforeach ?> 

</br><button type='submit'>Edit</button>
</form>
<?php

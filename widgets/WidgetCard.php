<?php 

class WidgetCard
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render() 
    {
        ?>

        <?php 
        foreach ($this->data as $key => $value) 
        {
            ?>
            <div style='padding:10px; border: #000 solid'>
            <?php foreach($value as $name => $item):?>
                <?php if ($name != 'id'){ ?>
                <p><?= ucfirst($name) ?>: <b><?= $item ?></b></p>
                <?php } ?>
            <?php endforeach?>
                <div style='display: flex; justify-content: space-around;'>
                    <a href=pages/editCard.php?id=<?= $value['id'] ?>>Edit</a>
                    <a href=requests/delete.php?id=<?= $value['id'] ?>>Delete</a>
                </div>
            </div>
            <?php
        }
    } 
}
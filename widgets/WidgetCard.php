<?php 

class WidgetCard
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render() : string
    {
        return ob_include(__DIR__ . '/widgetCard.phtml', ['data' => $this->data]);
    } 
}
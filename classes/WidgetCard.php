<?php 
namespace classes;
class WidgetCard
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render() : string
    {
        return ob_include(__DIR__ .'/../templates/widgetCard.phtml', ['data' => $this->data]);
    } 
}
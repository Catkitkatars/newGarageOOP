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
        if(isset($_SESSION['login'])) {
            return ob_include(__DIR__ .'/../templates/widgetCard.phtml', ['data' => $this->data]);
        }
        else 
        {
            return ob_include(__DIR__ .'/../templates/widgetCard_no_login.phtml', ['data' => $this->data]);
        }
        
    } 
}
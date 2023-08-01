<?php 
namespace classes;
require_once 'autoloader.php';
require_once 'templates/ob_include.php';



class MainBanner extends DataHandler {

    public function __construct($connect, $table)
    {
        parent::__construct($connect, $table);
        
    }

    public function render(){  
        $url = $this->banner_counter($GLOBALS['config']['advertisers'], $GLOBALS['config']['templateAdvertisers'])['url'];
        return ob_include( __DIR__ .'/../templates/mainBanner.phtml', ['url' => $url]);
    }
}
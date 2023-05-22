<?php 
require_once 'database/DataHandler.php';
require_once 'templates/ob_include.php';


class MainBanner extends DataHandler {

    public function __construct($servername, $username, $password, $dbname, $tableName)
    {
        parent::__construct($servername, $username, $password, $dbname, $tableName);
        
    }

    public function render(){  
        $url = $this->bannerCounter()['url'];
        return ob_include( __DIR__ .'/../templates/mainBanner.phtml', ['url' => $url]);
    }
}
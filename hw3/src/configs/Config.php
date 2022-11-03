<?php
/*

 contains a class with constants for things like 
 database user, password, host, port, etc. Basically, 
 it should have anything you think the grader might need
 to get your program running on the grader's machine.

*/

class Constants {

    public $dbHost;
    public $dbUser;
    public $dbPassword;
 
    function __construct($dbHost, $dbUser, $dbPassword) {
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }
}

?>
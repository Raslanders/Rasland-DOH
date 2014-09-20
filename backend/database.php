<?php

class Database {

    private $dbn;

    //public function __construct($database="prod1", $username = "root", $password = "root", $location = "127.0.0.1") {
    public function __construct($database="solow", $username = "root", $password = "", $location = "127.0.0.1") {
    //public function __construct($database="sepoauth", $username = "root", $password = "", $location = "127.0.0.1") {
    //public function __construct($database = "tagitdatabase", $username = "root", $password = "root", $location = "127.0.0.1") {
        $type = "mysql";
        $this->dbn = new PDO("$type:host=$location;dbname=$database", $username, $password);
        $this->dbn->setAttribute(PDO::ATTR_AUTOCOMMIT, TRUE);
        $this->dbn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
    }

    public function nquery($szQuery, $arr = array()) {
        $pStatement = $this->dbn->prepare($szQuery);
        $pStatement->execute($arr);
        return array();
    }

    public function getError() {
        print_r($this->dbn->errorInfo());
        return array();
    }

    public function query($szQuery, $arr = array(), $flags = PDO::FETCH_BOTH) {
        $pStatement = $this->dbn->prepare($szQuery);
        $pStatement->execute($arr);
        $aResult = $pStatement->fetchAll($flags); // Without fetch num this will default to AND the column index and column name.
        return $aResult;
    }

        public function dquery($szQuery, $arr = array(), $flags = PDO::FETCH_BOTH) {
        $pStatement = $this->dbn->prepare($szQuery);
        $pStatement->execute($arr);
        $aResult = $pStatement->rowCount();
// Without fetch num this will default to AND the column index and column name.
        return $aResult;
    }

    public function Q() {
        require_once("query.php");
        return new Query($this);
    }

    public function getDBN() {
        return $this->dbn;
    }

}

?>

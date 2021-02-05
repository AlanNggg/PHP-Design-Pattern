<?php
// Singleton
class Database {
    public static $instance;

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new Database();
        return self::$instance;
    }

    private function __construct() {

    }

    public function getQuery() {
        return "SELECT * FROM posts";
    }
}

class DB {

}
$db = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();

var_dump($db);
var_dump($db2);
var_dump($db3);
echo $db->getQuery();
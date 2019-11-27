<?php


/**
 * Class Sphinx
 * simple class as example how to connect to sphinx
 */
class Sphinx
{
    private static $_instance;

//singleton Database
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    private function __construct()
    {
        $dbh = new \PDO("mysql:host=127.0.0.1;port=9306","","");;
        $this->pdo = $dbh;
        //$this->pdo->query("SET wait_timeout=1200;");

        return $dbh;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @param $query
     * @return array
     */
    public function getParagraphsIds($query)
    {
        try{
            $sql = "SELECT id FROM content WHERE match( :query ) limit 0,200";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':query', $query);

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        } catch (\PDOException $e) {
            var_dump($e);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
}

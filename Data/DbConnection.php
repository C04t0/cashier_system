<?php

    namespace Data;

    use PDO;
    use PDOException;

    class DbConnection {
        private ?PDO $dbh;

        public function __construct() {
            $dsn = "mysql:host=localhost;port=3306;dbname=cashier_system;charset=utf8";
            $user = "root";
            $password = "";

            try {
                $this->dbh = new PDO($dsn, $user, $password);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function __destruct() {
            $this->dbh = null;
        }
        public function getDbh(): PDO {
            return $this->dbh;
        }
    }
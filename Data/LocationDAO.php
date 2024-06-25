<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Location;

    class LocationDAO {
        /* READ */
        public function getById(int $id): ?Location {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, name from locations where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $location = new Location($id, $row['name']);

            $dbh = null;
            $dbConn->__destruct();

            return $location;
        }
        public function getAll(): ?array {
            $list = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, name from locations';

            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $location = new Location((int)$row['id'], $row['name']);
                $list[] = $location;
            }

            $dbh = null;
            $dbConn->__destruct();

            return $list;
        }
    }

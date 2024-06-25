<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Table;

    class TableDAO {
        /* READ */
        public function getById(int $id): ?Table {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, table_number, max_persons, location_id from tables where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $table = new Table(
                $id,
                (int)$row['table_number'],
                (int)$row['max_persons'],
                (int)$row['location_id']
            );

            $dbh = null;
            $dbConn->__destruct();

            return $table;
        }
        public function getAll(): ?array {
            $list = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, table_number, max_persons, location_id from tables';

            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $table = new Table(
                    (int)$row['id'],
                    (int)$row['table_number'],
                    (int)$row['max_persons'],
                    (int)$row['location_id']
                );
                $list[] = $table;
            }
            $dbh = null;
            $dbConn->__destruct();

            return $list;
        }
    }
<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Category;

    class CategoryDAO {
        /* READ */
        public function getById(int $id): ?Category {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, name, parent_id from categories where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $category = new Category((int)$row['id'], $row['name'], $row['parent_id']);

            $dbh = null;
            $dbConn->__destruct();

            return $category;
        }
        public function getAll(): ?array {
            $list = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, name, parent_id from categories';

            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll();

            foreach($result as $row) {
                $category = new Category((int)$row['id'], $row['name'], $row['parent_id'] !== null ? (int)$row['parent_id'] : null);
                $list[] = $category;
            }

            $dbh = null;
            $dbConn->__destruct();

            return $list;
        }
    }

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
    }

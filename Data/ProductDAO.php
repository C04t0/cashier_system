<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Product;

    class ProductDAO {
        /* READ */
        public function getById(int $id): ?Product {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, category_id, name, price from products where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $product = new Product(
                $id,
                (int)$row['category_id'],
                $row['name'],
                $row['price']
            );

            $dbh = null;
            $dbConn->__destruct();

            return $product;
        }
        public function getAll(): ?array {
            $list = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, category_id, name, price from products';

            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $product = new Product(
                    (int)$row['id'],
                    (int)$row['category_id'],
                    $row['name'],
                    (float)$row['price']
                );
                $list[] = $product;
            }

            $dbh = null;
            $dbConn->__destruct();

            return $list;
        }
    }
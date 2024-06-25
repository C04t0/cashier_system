<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Orderline;

    class OrderlineDAO {
        /* CREATE */
        public function create(int $order_id, int $product_id, float $price, $amount, ?int $comment_id): int {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql =
                'insert into orderlines (order_id, product_id, price, amount, comment_id)
                    values (:order_id, :product_id, :price, :amount, :comment_id)';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':comment_id', $comment_id);
            $stmt->execute();

            $id = (int)$dbh->lastInsertId();

            $dbh = null;
            $dbConn->__destruct();

            return $id;
        }
        /* READ */
        public function getById(int $order_id, int $product_id): ?Orderline {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql =
                'select order_id, product_id, price, amount, comment_id
                    from orderlines
                    where order_id = :order_id && product_id = :product_id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $orderline = new Orderline($order_id, $product_id, $row['price'], $row['amount'], $row['comment_id']);

            $dbh = null;
            $dbConn->__destruct();

            return $orderline;
        }
        public function getOrderOverview(int $order_id): ?array {
            $list = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql =
                'select order_id, product_id, price, amount, comment_id
                    from orderlines
                    where order_id = :order_id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $orderline = new Orderline(
                    (int)$row['order_id'],
                    (int)$row['product_id'],
                    (float)$row['price'],
                    (int)$row['amount'],
                    (int)$row['comment_id']
                );
                $list[] = $orderline;
            }
            $dbh = null;
            $dbConn->__destruct();

            return $list;
        }
        /* UPDATE */
        public function update(int $order_id, int $product_id, int $amount, ?int $comment_id): Orderline {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql =
                'update orderlines
                    set product_id = :product_id, amount = :amount, comment_id = :comment_id
                    where order_id = :order_id && product_id = :product_id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':comment_id', $comment_id);
            $stmt->execute();

            $dbh = null;
            $dbConn->__destruct();

            return $this->getById($order_id, $product_id);
        }
        /* DELETE */
        public function delete(int $order_id, int $product_id): bool {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'delete from orderlines where order_id = :order_id && product_id = :product_id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();

            $dbh = null;
            $dbConn->__destruct();

            return $this->getById($order_id, $product_id) == null;
        }
    }
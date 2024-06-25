<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Order;

    class OrderDAO {
        /* CREATE */
        public function create(int $table_id, int $user_id): int {
            $total = 0;
            $status = 'active';
            $now = date("Y-m-d H:i");
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql =
                'insert into orders (table_id, user_id, total_price, status, timestamp)
                    values (:table_id, :user_id, :total_price, :status, :timestamp)';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':timestamp', $now);
            $stmt->bindParam(':total_price', $total);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':table_id', $table_id, PDO::PARAM_INT);
            $stmt->execute();

            $order_id = (int)$dbh->lastInsertId();

            $dbh = null;
            $dbConn->__destruct();

            return $order_id;
        }
        /* READ */
        public function getById(int $id): ?Order {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select table_id, user_id, total_price, status, timestamp from orders where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $order = new Order($id,
                $row['table_id'],
                $row['user_id'],
                $row['total_price'],
                $row['status'],
                $row['timestamp']
            );

            $dbh = null;
            $dbConn->__destruct();

            return $order;
        }
        /* UPDATE */
        public function updateStatus(int $id, string $status): Order {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'update orders set status = :status where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $dbh = null;
            $dbConn->__destruct();
            return $this->getById($id);
        }
    }
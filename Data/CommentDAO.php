<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Comment;

    class CommentDAO {

        /* CREATE */
        public function create(string $comment, ?int $order_id) : ?int {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'insert into comments (order_id, comment) values (:order_id, :comment)';

            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':order_id', $order_id);
            $stmt->bindValue(':comment', $comment);
            $stmt->execute();

            $id = (int)$dbh->lastInsertId();

            $dbh = null;
            $dbConn->__destruct();

            return $id;
        }
        /* READ */
        public function getById(int $id): ?Comment {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, comment, order_id from comments where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $comment = new Comment($id, $row['comment'], $row['order_id']);

            $dbh = null;
            $dbConn->__destruct();

            return $comment;
        }
        /*UPDATE */
        public function update(int $id, string $comment, ?int $order_id): Comment {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'update comments set comment = :comment, order_id= :order_id where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':comment', $comment);
            $stmt->bindValue(':order_id', $order_id);
            $stmt->execute();

            $dbh = null;
            $dbConn->__destruct();

            return $this->getById($id);
        }
    }
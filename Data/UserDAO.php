<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\User;

    class UserDAO {
        /* READ */
        public function getById(int $id): ?User {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, role_id, username, password from users where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User(
                $id,
                (int)$row['role_id'],
                $row['username'],
                $row['password']
            );
            $dbh = null;
            $dbConn->__destruct();

            return $user;
        }
        public function getByUsername(string $username): ?User {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, role_id, username, password from users where username = :username';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User((int)$row['id'], (int)$row['role_id'], $row['username'], $row['password']);

            $dbh = null;
            $dbConn->__destruct();

            return $user;
        }
        public function getAllWaiters(int $role_id): ?array {
            $userList = array();
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, role_id, username from users where role_id = :role_id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':role_id', $role_id);
            $stmt->execute();

            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $user = new User($row['id'], $row['role_id'], $row['username'], null);
                $userList[] = $user;
            }

            $dbh = null;
            $dbConn->__destruct();

            return $userList;
        }
        /* UPDATE */
        public function updatePassword(int $id, string $password): bool {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'update users set password = :password where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':password', $password_hash);
            $stmt->execute();

            $dbh = null;
            $dbConn->__destruct();

            return true;
        }
    }
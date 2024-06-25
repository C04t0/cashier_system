<?php

    declare(strict_types=1);

    namespace Data;
    use PDO;
    use Entities\Role;

    class RoleDAO {
        /* READ */
        public function getById(int $id): ?Role {
            $dbConn = new DbConnection();
            $dbh = $dbConn->getDbh();
            $sql = 'select id, name from roles where id = :id';

            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $role = $stmt->fetch(PDO::FETCH_ASSOC);

            $dbh = null;
            $dbConn->__destruct();

            return $role;
        }
    }
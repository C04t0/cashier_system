<?php

    declare(strict_types=1);

    namespace Business;
    use Data\RoleDAO;
    use Entities\Role;

    $roleDAO = new RoleDAO();

    class RoleService {
        public function getRole(int $id): ?Role {
            global $roleDAO;
            return $roleDAO->getById($id);
        }
    }

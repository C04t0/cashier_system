<?php

    declare(strict_types=1);

    namespace Business;
    use Data\UserDAO;
    use Entities\User;
    use Exceptions\UsernameInvalidException;

    $userDAO = new UserDAO();

    class UserService {
        public function getUser(int $id): ?User {
            global $userDAO;
            return $userDAO->getById($id);
        }
        public function getWaiters(int $id): ?array {
            global $userDAO;
            return $userDAO->getAllWaiters($id);
        }
        public function updatePassword(int $id, string $password): bool {
            global $userDAO;
            return $userDAO->updatePassword($id, $password);
        }
        public function login(string $username, string $password): bool {
            global $userDAO;
            $user = $userDAO->getByUsername($username);

            if ($user == null) {
                throw new UsernameInvalidException();
            }
            return password_verify($password, $user->getPassword());
        }
    }
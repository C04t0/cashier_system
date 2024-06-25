<?php

    declare(strict_types=1);

    namespace Business;
    use Data\OrderDAO;
    use Entities\Order;

    $orderDAO = new OrderDAO;

    class OrderService {
        public function createOrder(int $table_id, int $user_id): int {
            global $orderDAO;
            return $orderDAO->create($table_id, $user_id);
        }
        public function getOrder(int $id): ?Order {
            global $orderDAO;
            return $orderDAO->getById($id);
        }
        public function updateStatus(int $id, string $status): ?Order {
            global $orderDAO;
            return $orderDAO->updateStatus($id, $status);
        }
    }

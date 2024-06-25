<?php

    declare(strict_types=1);

    namespace Business;
    use Data\OrderlineDAO;
    use Entities\OrderLine;

    $orderlineDAO = new OrderlineDAO();

    class OrderlineService {
        public function createOrderline(int $order_id, int $product_id, float $price, $amount, ?int $comment_id): ?int {
            global $orderlineDAO;
            return $orderlineDAO->create($order_id, $product_id, $price, $amount, $comment_id);
        }
        public function getOrderline(int $order_id, int $product_id): OrderLine {
            global $orderlineDAO;
            return $orderlineDAO->getById($order_id, $product_id);
        }
        public function getOrderOverview(int $order_id): ?array {
            global $orderlineDAO;
            return $orderlineDAO->getOrderOverview($order_id);
        }
        public function updateOrderline(int $order_id, int $product_id, int $amount, ?int $comment_id): OrderLine {
            global $orderlineDAO;
            return $orderlineDAO->update($order_id, $product_id, $amount, $comment_id);
        }
        public function deleteOrderline(int $order_id, int $product_id): bool {
            global $orderlineDAO;
            return $orderlineDAO->delete($order_id, $product_id);
        }
    }
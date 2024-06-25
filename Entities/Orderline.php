<?php

    namespace Entities;

    class OrderLine {
        private int $order_id;
        private int $product_id;
        private float $price;
        private int $amount;
        private ?int $comment_id;

        public function __construct(int $order_id, int $product_id, float $price, float $amount, ?int $comment_id) {
            $this->order_id = $order_id;
            $this->product_id = $product_id;
            $this->price = $price;
            $this->amount = $amount;
            $this->comment_id = $comment_id;
        }
        public function getOrderId(): int {
            return $this->order_id;
        }
        public function getProductId(): int {
            return $this->product_id;
        }
        public function getPrice(): float {
            return $this->price;
        }
        public function getAmount(): float {
            return $this->amount;
        }
        public function getCommentId(): ?int {
            return $this->comment_id;
        }
    }
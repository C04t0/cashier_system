<?php

    namespace Entities;

    class Comment {
        private int $id;
        private ?int $order_id;
        private string $comment;

        public function __construct(int $id, string $comment, ?int $order_id) {
            $this->id = $id;
            $this->comment = $comment;
            $this->order_id = $order_id;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getComment(): string {
            return $this->comment;
        }
        public function getOrderId(): int {
            return $this->order_id;
        }
    }
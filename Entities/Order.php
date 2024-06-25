<?php

    namespace Entities;

    class Order {
        private int $id;
        private int $table_id;
        private int $user_id;
        private float $total;
        private string $status;
        private int $timestamp_id;

        public function __construct(int $id, int $table_id, int $user_id, int $total, int $status, int $timestamp_id) {
            $this->id = $id;
            $this->table_id = $table_id;
            $this->user_id = $user_id;
            $this->total = $total;
            $this->status = $status;
            $this->timestamp_id = $timestamp_id;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getUserId(): int {
            return $this->user_id;
        }
        public function getTableId(): int {
            return $this->table_id;
        }
        public function getTotal(): float {
            return $this->total;
        }
        public function setTotal(float $total): void {
            $this->total = $total;
        }
        public function getStatus(): string {
            return $this->status;
        }
        public function getTimestampId(): int {
            return $this->timestamp_id;
        }
    }
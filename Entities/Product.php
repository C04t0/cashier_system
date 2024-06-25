<?php

    namespace Entities;

    class Product {
        private int $id;
        private int $category_id;
        private string $name;
        private float $price;

        public function __construct(int $id, int $category_id, string $name, float $price) {
            $this->id = $id;
            $this->category_id = $category_id;
            $this->name = $name;
            $this->price = $price;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getCategoryId(): int {
            return $this->category_id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getPrice(): float {
            return $this->price;
        }
    }
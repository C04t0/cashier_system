<?php

    namespace Entities;

    class Category {
        private int $id;
        private string $name;
        private ?int $parent_id;

        public function __construct(int $id, string $name, ?int $parent_id) {
            $this->id = $id;
            $this->name = $name;
            $this->parent_id = $parent_id;
        }

        public function getId(): int {
            return $this->id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getParentId(): ?int {
            return $this->parent_id;
        }
    }
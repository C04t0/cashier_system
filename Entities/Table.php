<?php

    namespace Entities;

    class Table {
        private int $id;
        private int $table_number;
        private int $max_persons;
        private int $location_id;

        public function __construct(int $id, int $table_number, int $max_persons, int $location_id) {
            $this->id = $id;
            $this->table_number = $table_number;
            $this->max_persons = $max_persons;
            $this->location_id = $location_id;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getTableNumber(): int {
            return $this->table_number;
        }
        public function getMaxPersons(): int {
            return $this->max_persons;
        }
        public function getLocationId(): int {
            return $this->location_id;
        }
    }
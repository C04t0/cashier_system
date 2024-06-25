<?php

    namespace Entities;

    class User {
        private int $id;
        private int $role_id;
        private string $username;
        private ?string $password;

        public function __construct(int $id, int $role_id, string $username, ?string $password) {
            $this->id = $id;
            $this->role_id = $role_id;
            $this->username = $username;
            $this->password = $password;
        }
        public function getId(): int {
            return $this->id;
        }
        public function getRoleId(): int {
            return $this->role_id;
        }
        public function getUsername(): ?string {
            return $this->username;
        }
        public function getPassword(): ?string {
            return $this->password;
        }
        public function setPassword(string $password): void {
            $this->password = $password;
        }
    }
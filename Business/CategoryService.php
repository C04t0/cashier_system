<?php

    declare(strict_types=1);

    namespace Business;
    use Data\CategoryDAO;
    use Data\DbConnection;
    use Entities\Category;

    $categoryDAO = new CategoryDAO();

    class CategoryService {
        public function getCategory(int $id): ?Category {
            global $categoryDAO;
            return $categoryDAO->getById($id);
        }

        public function getAll(): ?array {
            global $categoryDAO;
            return $categoryDAO->getAll();
        }
    }


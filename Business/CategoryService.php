<?php

    declare(strict_types=1);

    namespace Business;
    use Data\CategoryDAO;
    use Entities\Category;

    $categoryDAO = new CategoryDAO();

    class CategoryService {
        public function getCategory(int $id): ?Category {
            global $categoryDAO;
            return $categoryDAO->getById($id);
        }
    }


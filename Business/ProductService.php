<?php

    declare(strict_types=1);

    namespace Business;
    use Data\ProductDAO;
    use Entities\Product;

    $productDAO = new ProductDAO();

    class ProductService {
        public function getProduct(int $id): ?Product {
            global $productDAO;
            return $productDAO->getById($id);
        }
        public function getAll(): ?array {
            global $productDAO;
            return $productDAO->getAll();
        }
    }
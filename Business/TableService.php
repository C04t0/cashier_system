<?php

    declare(strict_types=1);

    namespace Business;
    use Data\TableDAO;
    use Entities\Table;

    $tableDAO = new TableDAO();

    class TableService {
        public function getTable(int $id): ?Table {
            global $tableDAO;
            return $tableDAO->getById($id);
        }
        public function getAll(): ?array {
            global $tableDAO;
            return $tableDAO->getAll();
        }
    }

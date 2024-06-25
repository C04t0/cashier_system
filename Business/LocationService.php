<?php

    declare(strict_types=1);

    namespace Business;
    use Data\LocationDAO;
    use Entities\Location;

    $locationDAO = new LocationDAO();

    class LocationService {
        public function getLocation(int $id): ?Location {
            global $locationDAO;
            return $locationDAO->getById($id);
        }
        public function getAll(): ?array {
            global $locationDAO;
            return $locationDAO->getAll();
        }
    }

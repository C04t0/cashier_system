<?php

require_once 'vendor/autoload.php';
spl_autoload_register();

use Data\CategoryDAO;

$categoryDAO = new CategoryDAO();
$categories = $categoryDAO->getAll();

foreach ($categories as $category) {
    echo 'ID: ' . $category->getId() . ' Name: ' . $category->getName() . ' Parent ID: ' . ($category->getParentId() !== null ? $category->getParentId() : 'NULL') . "\n";
}

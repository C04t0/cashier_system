<?php

    declare(strict_types=1);
    spl_autoload_register();

    require_once 'vendor/autoload.php';

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    use Business\UserService;
    use Business\RoleService;
    use Business\OrderService;
    use Business\TableService;
    use Business\ProductService;
    use Business\CommentService;
    use Business\LocationService;
    use Business\CategoryService;
    use Business\OrderlineService;

    $loader = new FilesystemLoader('Presentation');
    $twig = new Environment($loader);

    $userService = new UserService();
    $tableService = new TableService();
    $productService = new ProductService();
    $locationService = new LocationService();

    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_role = $userService->getUser((int)$_SESSION['user_id'])->getRoleId();
        if ($user_role == 2) {
            $tables = $tableService->getAll();
            $locations = $locationService->getAll();
            echo $twig->render('table_select.twig', ['tables'=>$tables, 'locations'=>$locations]);
        }
    } else {
        $userList = $userService->getWaiters(2);
        echo $twig->render('user_id_screen.twig', ['users'=>$userList]);
    }
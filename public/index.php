
    <?php
    session_start();
    // require '../app/layouts/navbar.php';
    $url = $_GET["url"] ?? '/';
    include '../app/layouts/navbar.php';

    switch ($url) {
        case '/':
            require_once '../app/controller/home_controller.php';
            home_index();
            break;
        case 'about':
            require '../app/pages/about.php';
            about_index();
            break;
        default:
            require_once("../app/controllers/home_controller.php");
            home_index();
            break;
    }
    require '../app/layouts/footer.php';

    ?>
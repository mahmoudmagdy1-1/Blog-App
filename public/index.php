
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
        case 'home':
            require_once '../app/controller/home_controller.php';
            home_index();
            break;
        case 'post':
            require '../app/pages/post.php';
            break;
        case 'posts':
            require '../app/controller/postController.php';
            post_index();
            break;
        case 'posts_all':
            require '../app/pages/post_index.php';
            break;
        case 'add_post':
            require '../app/pages/post_create.php';
            break;
        case 'store-post':
            require '../app/controller/postController.php';
            store_post();
        case 'contact':
            require '../app/pages/contact.php';
            break;
        case 'SignUp':
            require '../app/pages/register.php';
            break;
        case 'login':
            require '../app/pages/login.php';
            break;
        case 'logout':
            require '../app/pages/logout.php';
            break;
        case 'store-user':
            require '../app/controller/userController.php';
            store_user();
            break;
        case 'check-login':
            require '../app/controller/userController.php';
            check_login_user();
            break;
        case 'user-profille':
            require '../app/pages/user_profile.php';
            break;
        case 'edit_user':
            require '../app/pages/user_edit.php';
            break;
        case 'update-user':
            require '../app/controller/userController.php';
            update_user_data();
            break;
        case 'edit_user_password':
            require '../app/pages/user_change_password.php';
            break;
        case 'update-user-password':
            require '../app/controller/userController.php';
            update_user_password();
            break;
        case 'like_post':
            require '../app/controller/like_controller.php';
            likeIndex();
            break;
        case 'store_like':
            require '../app/controller/postController.php';
            post_index();
            break;
            // default:
            //     require_once("../app/controllers/home_controller.php");
            //     home_index();
            //     break;
    }
    require '../app/layouts/footer.php';

    ?>
<?php
if (isset($_SESSION['auth'])) {
    header("location:/");
    die;
}

?>

<header class="masthead" style="background-image: url('../app/storage/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Register</h1>
                    <span class="subheading">Please type your info</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center">Register</h2>
    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert alert-danger text-center">
            <?php echo   $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>

    <?php endif; ?>

    <?php if (isset($_SESSION['errors'])):
        foreach ($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center">
                <?php echo   $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']);    ?>
    <?php endif; ?>

    <form method="post" action="store-user" class="border p-3 mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>


        <div class="mb-3">
            <label for="Age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" id="age">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary ">Register</button>
    </form>
</div>
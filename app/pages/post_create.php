<header class="masthead" style="background-image: url('../app/assets/img/about-bg.jpg')">
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
    <h2 class="border p-2 my-2 text-center">Add Post</h2>
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

    <form method="post" action="store-post" class="border p-3 mb-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" class="form-control" name="content" id="content">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary ">Add</button>
    </form>
</div>
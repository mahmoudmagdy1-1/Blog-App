<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center"> Edit User Profile</h2>

    <!-- Handling Messages Form Session -->
    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert alert-danger text-center">
            <?php echo  $_SESSION['error']; ?>
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
    <?php if (isset($_SESSION['Success'])): ?>
        <div class="alert alert-success rounded-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['Success'] ?></div>
                <div class="col-auto">
                    <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                        <i class="fa-solid fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['Success']);    ?>
    <?php endif; ?>
    <!--END of Handling Messages Form Session -->

    <?php if (isset($_SESSION['auth'])):
        $User = (object)$_SESSION['auth']; ?>
        <form method="post" action="update-user" class="border p-3 mb-5" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $User->id ?>">

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $User->first_name ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $User->last_name ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $User->email ?>">
            </div>


            <div class="mb-3">
                <label for="Age" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="age" value="<?php echo $User->age ?>">
            </div>

            <div class="form-check">
                <?php if (!empty($User->user_image)): ?>
                    <img src="<?php echo $User->user_image ?>" alt="user image" style="width:200px; height:150px;"><br><br>
                    <input class="form-check-input" type="checkbox" value="remove_image" name="remove_image" id="remove_image">
                    <label class="form-check-label" for="remove_image">remove image</label>
                <?php else: ?>
                    <label class="form-check-label" for="remove_image">no image uploaded</label>
                <?php endif; ?>

            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Choose Image if you want to update it</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary ">Update</button>
        </form>
    <?php endif; ?>

</div>
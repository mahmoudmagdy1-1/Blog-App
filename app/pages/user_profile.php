<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center"> User Profile</h2>

    <!-- Handling Messages Form Session -->
    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert alert-danger text-center">
            <?php echo  $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>

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
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">(<?php echo  $User->id;  ?>)</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">First Name</th>
                    <td><?php echo $User->first_name;  ?></td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td><?php echo $User->last_name;  ?></td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td><?php echo $User->email;  ?></td>
                </tr>
                <tr>
                    <th scope="row">Age</th>
                    <td><?php echo $User->age  ?></td>
                </tr>


                <th scope="row">Image Profile</th>
                <td><!--'../app/storage/about-bg.jpg'-->
                    <?php if (!empty($User->user_image)): ?>
                        <img src="<?php echo $User->user_image ?>" alt="user image" style="height:150px;width:150px;">
                    <?php else: ?>
                        <?php echo $User->user_image ?>
                        No Image Uploaded
                        <!--<img src="../app/assets/img/user-icon.png" alt="user image" style="height:150px;width:150px;">-->
                    <?php endif ?>
                </td>
                </tr>

                <tr>

                    <td class="text-center">
                        <a href="edit_user&id=<?= $User->id ?>" class="btn btn-sm btn-outline-info rounded-0">
                            <i class="fa-solid fa-edit"></i>Edit
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="edit_user_password&id=<?= $User->id ?>" class="btn btn-sm btn-outline-info rounded-0">
                            <i class="fa-solid fa-edit"></i>Change Password
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>

    <?php endif; ?>

</div>
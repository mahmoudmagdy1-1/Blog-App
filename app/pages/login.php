<?php 
if(isset($_SESSION['auth'])){
    header("location:/");
    die;
};

?>

<div class="container mt-5 mb-5">
        <h2>Login</h2>
        <?php if(isset($_SESSION['error'])):?>
            
            <div class="alert alert-danger text-center">
                <?php echo  $_SESSION['error'] ;?>
                <?php unset($_SESSION['error']);?>
            </div>
            
        <?php endif;?>
        
        <?php if(isset($_SESSION['errors'])):
            foreach($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center">
                <?php echo   $error;?>
            </div>
            <?php endforeach;
            unset($_SESSION['errors']);    ?>
        <?php endif;?>
        
        
        <form method="post" action="?url=check-login" class="border p-3">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
           
            <button type="submit" class="btn btn-primary">Login</button>
            
        </form>
    </div>




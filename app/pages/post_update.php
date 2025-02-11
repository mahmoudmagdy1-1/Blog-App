
<header class="masthead" style="background-image: url('../app/storage/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                <h1>Post Update</h1>
                <span class="subheading">Please type your post data</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-5 mb-5">
        <h2 class="border p-2 my-2 text-center">Update Post</h2>
        <?php if(isset($_SESSION['error'])):?>
            
            <div class="alert alert-danger text-center">
                <?php echo   $_SESSION['error'];?>
                <?php unset($_SESSION['error']);?>
            </div>
            
        <?php endif;?>
        
        <?php if(isset($_SESSION['errors'])):
            foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo   $error;?>
                </div>
            <?php endforeach;?>
            <?php unset($_SESSION['errors']);    ?>
        <?php endif;?>

        <?php if(isset($_SESSION['Post'])):?>
        <?php $Post=$_SESSION['Post'];?>
        
        <form method="post" action="?url=update-post" class="border p-3 mb-5" enctype="multipart/form-data">
            <input type="hidden"  name="id" id="id" value="<?= $Post->id ?>">

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $Post->title;?>">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
                <input type="text" class="form-control" name="content" id="content" value="<?= $Post->content;?>">
            </div>
            
            <?php if(!empty($Post->image)):?>
                <img src="<?php echo $Post->image ?>" alt="post image" style="height:150px;width:150px;"><br><br>
                <input class="form-check-input" type="checkbox" value="remove_image" name="remove_image" id="remove_image" >
                <label class="form-check-label" for="remove_image">remove image</label>
            <?php endif ?><br>
            <div class="mb-3">
                <label for="image" class="form-label">Choose Image</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>
           
            <button type="submit" class="btn btn-primary ">Update</button>
        </form>
        <?php endif?>
    </div>


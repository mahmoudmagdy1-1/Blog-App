<!-- Page Header-->
<header class="masthead" style="background-image: url('../app/assets/img/post-bg.jpg'); height:100px;">
    <div class="container position-relative px-4 px-lg-5">
        
    </div>
</header>



<!-- Handling Messages Form Session -->

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
<?php if(isset($_SESSION['error'])):?>
            
            <div class="alert alert-danger text-center">
                <?php echo   $_SESSION['error'];?>
                <?php unset($_SESSION['error']);?>
            </div>
            
<?php endif;?>
<?php if (isset($_SESSION['errors'])):
        foreach ($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center">
                <?php echo   $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']);    ?>
    <?php endif; ?>
        
<!--END of Handling Messages Form Session -->
<!---------------------------Posts------------------------->
<div class="container">


    <!--------------------------------------for each  ------------------------------------->
    
    <?php if (isset($_SESSION['Post'])): ?>
        <?php $post=$_SESSION['Post']; ?>

            <!--------------------- show post data-------------------------------->
            <div class="card mt-2 mb-2 Post_card">
                <a href="show_post&id=<?= $post['id']?>">
                    <div class="card-header head_post">

                    <div class="header_image float-start">
                            
                            <?php if(!empty($post['user_image'])):?>
                                <img class="media-object rounded-circle" src="<?php echo $post['user_image'] ?>" alt="Image"style="height:50px;width:50px;"/>
                                
                            <?php else:?>
                                <img class="media-object rounded-circle" src="../app/assets/img/user-icon.png" alt="Image" style="height:50px;width:50px;"/>
                            <?php endif;?>
                        </div>
                        <div class="header_post float-start">
                        <h6 ><?php echo $post['first_name'].' '.  $post['last_name'];?></h6>
                        <h6 > <?php echo $post['created_at'] ?></h6>
                        </div>
                        <?php if(isset($_SESSION['auth'])):?>
                            
                            <?php if($_SESSION['auth']['id']== $post['user_id']):?>
                            <div class="float-end">
                                <form method="post" action="edit_post">
                                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                    
                                    <button type="submit" class="btn btn-sm btn-outline-info rounded-0">
                                    <i class="fa-solid fa-edit"></i>Edit</button>

                                </form>
                                
                            
                                <form method="post" action="delete_post">
                                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                    
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-0">
                                    <i class="fa-solid fa-trash"></i>delete</button>

                                </form>
                                
                                
                            </div>
                            <?php endif;?>
                        <?php endif;?>
                        <div style="clear:both;"></div>

                    </div>
                    <div class="card-body">
                        <h4 class="text-primary title_post"><?php echo $post['title'] ?></h4>
                        <br /><br />
                        <b><?php echo $post['content'] ?></b>
                        <br /><br />
                        <?php if (!empty($post['image'])): ?>
                            <img class="media-object" src="<?php echo $post['image'] ?>" alt="Image" style="height:150px;width:150px;" />
                        <?php endif; ?>

                    </div>
                </a>
                <div class="card-header">
                    <form method="post" action="like_post">
                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                        <button type="submit" class="post_react border-0 bg-transparent">
                            <?php if ($post['user_liked']): ?>
                                <!-- Show Dislike SVG when the post is liked -->
                                <svg fill="#000000" height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 208.666 208.666" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path d="M54.715,24.957c-0.544,0.357-1.162,0.598-1.806,0.696l-28.871,4.403c-2.228,0.341-3.956,2.257-3.956,4.511v79.825 c0,1.204,33.353,20.624,43.171,30.142c12.427,12.053,21.31,34.681,33.983,54.373c4.405,6.845,10.201,9.759,15.584,9.759 c10.103,0,18.831-10.273,14.493-24.104c-4.018-12.804-8.195-24.237-13.934-34.529c-4.672-8.376,1.399-18.7,10.989-18.7h48.991 c18.852,0,18.321-26.312,8.552-34.01c-1.676-1.32-2.182-3.682-1.175-5.563c3.519-6.572,2.86-20.571-6.054-25.363 c-2.15-1.156-3.165-3.74-2.108-5.941c3.784-7.878,3.233-24.126-8.71-27.307c-2.242-0.598-3.699-2.703-3.405-5.006 c0.909-7.13-0.509-20.86-22.856-26.447C133.112,0.573,128.281,0,123.136,0C104.047,0.001,80.683,7.903,54.715,24.957z"></path>
                                        </g>
                                    </g>
                                </svg>

                                Dislike (<?= $post['likes_count'] ?>)
                            <?php else: ?>
                                <!-- Show Like SVG when the post is not liked -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046z" />
                                </svg>
                                Like (<?= $post['likes_count'] ?? 0 ?>)
                            <?php endif; ?>
                        </button>

                    </form>
                    <div class="post_react">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                        </svg> Comment (<?= $post['comments_count'] ?? 0 ?>)
                    </div>
                </div>
                <!---------------------------------add new comment------------------------->
                <div class="card-body">
                    <form action="add_comment" method="POST" class="form border p-2 my-5">
                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                        <input type="text" name="content" class="form-control my-3 border border-success" placeholder="add new comment">
                        <input type="submit" value="Add comment" class="text-center btn btn-primary my-3 " placeholder="add new todo">
                    </form>
                </div>
                

            </div>
            <!--------------------------------------for each comment in post ------------------------------------->
            <div class="card container">
                <h3>Comments:</h3>
                <?php if (isset($_SESSION['Post_comments'])): ?>
                    <?php foreach ($_SESSION['Post_comments'] as $key => $comment): ?>

                        <div class="card mt-2 mb-2 Post_card">
                           
                            <div class="card-header head_post">

                                <div class="header_image float-start">
                                        
                                        <?php if(!empty($comment['user_image'])):?>
                                            <img class="media-object rounded-circle" src="<?php echo $comment['user_image'] ?>" alt="Image"style="height:50px;width:50px;"/>
                                            
                                        <?php else:?>
                                            <img class="media-object rounded-circle" src="../app/assets/img/user-icon.png" alt="Image" style="height:50px;width:50px;"/>
                                        <?php endif;?>
                                </div>
                                <div class="header_post float-start">
                                    <h6 ><?php echo $comment['first_name'].' '.  $comment['last_name'];?></h6>
                                    <h6 > <?php echo $comment['created_at'] ?></h6>
                                </div>
                                    <?php if(isset($_SESSION['auth'])):?>
                                        
                                        <?php if($_SESSION['auth']['id']== $comment['user_id']):?>
                                
                                            
                                        <div class="float-end">
                                            <div class="">

                                                <!-- Button to toggle collapse -->
                                                <button class=" btn btn-sm btn-outline-info rounded-0 float-end" type="button" data-bs-toggle="collapse" data-bs-target="#demoCollapse">
                                                <i class="fa-solid fa-edit"></i> Edit
                                                </button>


                                            </div>
                                            
                                        
                                            <form method="post" action="delete_comment">
                                                <input type="hidden" name="id" value="<?= $comment['comment_id'] ?>">
                                                <input type="hidden" name="post_id" value="<?= $post['id']?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-0">
                                                <i class="fa-solid fa-trash"></i>delete</button>

                                            </form>
                                            
                                            
                                        </div>
                                        <?php endif;?>
                                    <?php endif;?>
                                    <div style="clear:both;"></div>

                                </div>
                                <div class="card-body">
                                    <b><?php echo $comment['content'] ?></b>
                                    <br /><br />
                                    <!-- Collapsible co<i class="fa-solid fa-edit"></i>ntent -->
                                    <div id="demoCollapse" class="collapse mt-3">
                                        <form method="post" action="edit_comment">
                                            <input type="hidden" name="id" value="<?= $comment['comment_id'] ?>">
                                            <input type="hidden" name="post_id" value="<?= $post['id']?>">
                                            <input type="text" name="content"  value="<?=$comment['content'] ?>" class="form-control my-3 border border-success" placeholder="add new comment">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            
                            <div class="card-header">
                                <form method="post" action="like_comment">
                                    <input type="hidden" name="comment_id" value="<?= $comment['comment_id'] ?>">
                                    <input type="hidden" name="post_id" value="<?= $post['id']?>">
                                    <button type="submit" class="post_react border-0 bg-transparent">
                                        <?php if (isset($comment['like_id'])): ?>
                                            <!-- Show Dislike SVG when the post is liked -->
                                            <svg fill="#000000" height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 208.666 208.666" xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <path d="M54.715,24.957c-0.544,0.357-1.162,0.598-1.806,0.696l-28.871,4.403c-2.228,0.341-3.956,2.257-3.956,4.511v79.825 c0,1.204,33.353,20.624,43.171,30.142c12.427,12.053,21.31,34.681,33.983,54.373c4.405,6.845,10.201,9.759,15.584,9.759 c10.103,0,18.831-10.273,14.493-24.104c-4.018-12.804-8.195-24.237-13.934-34.529c-4.672-8.376,1.399-18.7,10.989-18.7h48.991 c18.852,0,18.321-26.312,8.552-34.01c-1.676-1.32-2.182-3.682-1.175-5.563c3.519-6.572,2.86-20.571-6.054-25.363 c-2.15-1.156-3.165-3.74-2.108-5.941c3.784-7.878,3.233-24.126-8.71-27.307c-2.242-0.598-3.699-2.703-3.405-5.006 c0.909-7.13-0.509-20.86-22.856-26.447C133.112,0.573,128.281,0,123.136,0C104.047,0.001,80.683,7.903,54.715,24.957z"></path>
                                                    </g>
                                                </g>
                                            </svg>

                                            Dislike (<?= $comment['likes_comment_count'] ?>)
                                        <?php else: ?>
                                            <!-- Show Like SVG when the post is not liked -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046z" />
                                            </svg>
                                            Like (<?= $comment['likes_comment_count'] ?? 0 ?>)
                                        <?php endif; ?>
                                    </button>

                                </form>
                                
                                
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
    <?php endif; ?>




</div>

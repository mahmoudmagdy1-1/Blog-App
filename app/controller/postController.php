<?php
require_once( '../app/models/post_model.php');

function post_index(){
    $posts=list_Posts();
    
    /*echo "<pre>";
    print_r($posts[2]);
    echo "</pre><br>**************************<br>";*/
    $post_All=$posts[0];
    for($i=0;$i<count($posts[0]);$i++){

        for($j=0;$j<count($posts[1]);$j++){
            if($posts[0][$i]['id']==$posts[1][$j]['id']){
                //echo "id= ".$posts[1][$j]['id'].", likes_count =".$posts[1][$j]['likes_count']."<br>";
                $post_All[$i]['likes_count']=$posts[1][$j]['likes_count'];
                break;
            }

        }
        for($j=0;$j<count($posts[2]);$j++){
            if($posts[0][$i]['id']==$posts[2][$j]['id']){
                //echo "id= ".$posts[2][$j]['id'].", comments_count =".$posts[2][$j]['comments_count']."<br>";
                $post_All[$i]['comments_count']=$posts[2][$j]['comments_count'];
                break;
            }

        }

    }

    /*echo "<pre>";
    print_r($post_All);
    echo "</pre><br>**************************<br>";*/

    $_SESSION['post_All']=$post_All;
    header("location:?url=posts_all");
    die;


}




?>
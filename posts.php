    <?php include 'inc/functions.php' ?>

    <?php
        $posts = new Post();
        if (!isset($_GET['post_id']) && !isset($_GET['user_id'])) {
            echo json_encode($post->getPosts());
        } else {

            if (isset($_GET['post_id'])){
                echo json_encode($post->searchById(filter_var($_GET['post_id'], FILTER_SANITIZE_STRING)));
            }else{
                echo json_encode($post->searchByUserId(filter_var($_GET['user_id'], FILTER_SANITIZE_STRING)));
            }

        }

    ?>





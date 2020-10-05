    <?php

    if (!function_exists('dd')) {
        function dd(...$vars)
        {
            foreach ($vars as $v) {
                var_dump($v);
            }

            die(1);
        }
    }

    spl_autoload_register(function ($class) {
        include './classes/' . $class . '.php';
    });
    new DbConnections;

    // import one time
    $user = new User();
    //$user->getUsersApi();
    $post = new Post();
    //$post->getPostsApi();


    //test queries
    //dd($post->searchByContent('cupiditate'));
    //dd($post->getAvg());
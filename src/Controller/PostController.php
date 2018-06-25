<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\Commentrepository;

/**
 * Class PostController
 */

class PostController
{
    /**
     * Get the last 10 posts
     *
     * @var $posts
     */
    public function listPosts()
    {
        $postRepository = new PostRepository();
        $posts = $postRepository->getByLimit();
        require '../src/View/postListView.php';
    }
    
    /**
     * La function crée des occurences pour obtenir un article avec ses commentaires
     *
     * @var $article and contents
     */
    public function post()
    {
        $postId = $_GET['id'];
        $postRepository = new PostRepository();

        if (!empty($postId)) {
            $post = $postRepository->getOneById($postId);
        }

        $comments = new CommentRepository();
        if (!empty($postId)) {
            $comments->getByPostId($postId);
        }
        require '../src/View/postView.php';
    }
}
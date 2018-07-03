<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\Commentrepository;
use App\Entity\User;

/**
 * Class PostController
 */

class PostController
{
    /**
     * Get the last 10 posts
     * @var $posts
     */
    public function listPosts()
    {
        $postRepository = new PostRepository();
        $posts = $postRepository->getByLimit();

        $userid = $posts->getUserId();
        $user = new User($userId);
        $author = $user->getName();

        require '../src/View/postListView.php';
    }
    
    /**
     * Get one article with comments
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

    /**
     * Get author of a post
     * @var $author
     */
    public function author()
    {
        $userId = $_post['userId'];
        $userRepository = new UserRepository();
        if(!empty($userId)){
            $author = $userRepository->getAuthor();
        }
    }
}
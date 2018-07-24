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
        require '../src/View/postListView.php';
    }
    
    /**
     * Get one article with comments
     * @var $article and contents
     */
    public function post()
    {       
        $postRepository = new PostRepository();
        $dispComment = new CommentRepository();

        $postId = $_GET['id'];
        if (!empty($postId)) {
            $post = $postRepository->getOneById($postId);
            $comments = $dispComment->getCommentsPost($postId);
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

    public function newPost()
    {
        $addPost = new PostRepository();
        $addPost->addPost();
    }
}
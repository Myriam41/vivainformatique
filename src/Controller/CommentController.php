<?php

namespace App\Controller;

use App\Repository\CommentRepository;

/**
 * Class CommentController
 */

class CommentController
{
    public function commentsPost()
    {
        $dispComment = new CommentRepository();
        $comments = $dispComment->getCommentsPost();
    }

    public function commentAdd()
    {
        $commentAdd = new CommentRepository();
        $commentAdd->newComment();
    }
}

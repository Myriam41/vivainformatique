<?php

namespace App\Controller;

use App\Repository\CommentRepository;

/**
 * Class CommentController
 */

class CommentController
{
    public function commentDelete()
    {
        $commentDelete = new CommentRepository();
        $commentDelete->DeleteComment();
    }

    public function commentEdit()
    {
        $commentRepo = new CommentRepository();
        $comment = $commentRepo->getOneComment();
        require '../src/View/editCommentView.php';

    }

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

    public function commentUpdate()
    {
        $commentUpdate = new CommentRepository();
        $commentUpdate->UpdateComment();
    }
}

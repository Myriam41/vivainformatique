<?php
namespace App\Repository;

use App\Model\Connect;
use App\Entity\Comment;

class CommentRepository extends Connect
{
    function getByPostId($articleID)
    {
        $db = $this->getDb();
        $articleId = $_GET['id'];
    
        // récupération des 10 derniers comments d'un article 
        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM comments';
        $reqWhere = ' WHERE postId = :postId ORDER BY createdAt LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->bindparam(':postId', $postId, \PDO::PARAM_INT);
        $req->execute();
        
        $comments = [];
        while ($comment = $req->fetch())
        {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }
    
    function getComment($commentID)
    {
        $db = $this->getDb();
    
        // recherche de l'article demandé
        $req = $db->prepare('SELECT id, author, contmessage, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%im%ss\') AS date_comment_fr FROM comments');
        $req->execute(array($postId));
        $comment = [];
        $comment = $req->fetch();
    
        return $comment;
    }
}
<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\Comment;

class CommentRepository extends Connect
{
    public function getCommentsPost($articleID)
    {
        $db = $this->getDb();
    
        // récupération des 10 derniers comments d'un article
        $reqSelect = 'SELECT c.id AS comment_id, 
        c.contmessage, c.createdAt, c.updateAt, u.pseudo';
        $reqFrom = ' FROM comments AS c';
        $reqOn = ' INNER JOIN post ON c.postId = post.id
        INNER JOIN user AS u ON c.userId = u.id';
        $reqWhere = ' WHERE postId = :articleId';
        $reqLimit = ' ORDER BY c.createdAt DESC LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqWhere . $reqLimit);
        $req->bindparam(':articleId', $_SESSION['postId'], \PDO::PARAM_INT);
        $req->execute();
        
        $comments = [];
        while ($data = $req->fetch()) {
            $comments[] = $data;
        }
        $req->closeCursor();
        return $comments;
    }
    
    public function getComment($commentID)
    {
        $db = $this->getDb();
    
        // recherche de l'article demandé
        $req = $db->prepare('SELECT id, author, contmessage, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%im%ss\') AS date_comment_fr FROM comments');
        $req->execute(array($postId));
        $comment = [];
        $comment = $req->fetch();
    
        return $comment;
    }

    /**
     * Function pour ajouter un article dans la bd
     */
    public function newComment()
    {
        $db = $this->getDb();

        $reqInsert = 'INSERT INTO comments';
        $reqCol = '(postId, contmessage, createdAt, userId, parentId)';
        $reqValues = ' VALUES(:postId, :contmessage, NOW() , :userId, :parentId)';
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        $req->bindParam(':postId', $_SESSION['postId'], \PDO::PARAM_STR);
        $req->bindParam(':contmessage', $_SESSION['contmessage'], \PDO::PARAM_STR);
        $req->bindParam(':userId', $_SESSION['userId'], \PDO::PARAM_INT);
        $req->bindParam(':parentId', $_SESSION['parentId'], \PDO::PARAM_INT);

        $req->execute();
    }
}
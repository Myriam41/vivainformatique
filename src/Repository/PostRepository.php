<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\Post;
use App\Entity\User;
use PDO;

/**
 * Class PostRepository extend Connect
 * functions to retreive data from articles
 */

class PostRepository extends Connect
{
    /**
     * @function retreive the last 10 articles
     * @return $Posts array
     */
    public function getByLimit()
    {
        $db = $this->getDb();
    
        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM post INNER JOIN user';
        $reqOn = ' ON post.userId = user.id';
        $reqLimit = ' ORDER BY post.createdAt DESC LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqLimit);
        $req->execute();
        $posts=[];

        while ($data = $req->fetch())
        { 
            $datas[]= $data;
        }

        $req->closeCursor();
        return $datas;
    }
    
    /**
     * @function retreive a post with id
     * @param int $postId retreive one post
     * @return $post
     */
    public function getOneById($postId)
    {
        $db = $this->getDb();

        $articleId = $_GET['id'];

        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM post';
        $reqWhere = ' WHERE id = :postId';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->bindParam(':postId', $articleId, \PDO::PARAM_INT);
        $req->execute();
        
        $data = $req->fetch();
        $post = new Post($data);

        $req->closeCursor();
        return $post;
    }

    /**
     * Function pour obtenir tous les articles
     */
    public function allPost()
    {

    }

    /**
     * Function pour ajouter un article dans la bd
     */
    public function addPost()
    {
        $db = $this->getDb();

        $reqInsert = 'INSERT INTO post';
        $reqCol = '(title, introduction, content, createdAt, userId)';
        $reqValues = ' VALUES(:title, :introduction, :content, NOW() , :userId)';
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        $req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
        $req->bindParam(':introduction', $_SESSION['introduction'], \PDO::PARAM_STR);
        $req->bindParam(':content', $_SESSION['content'], \PDO::PARAM_STR);
        $req->bindParam(':userId', $_SESSION['userId'], \PDO::PARAM_INT);

        $req->execute();
        
    }

    /**
     * Function pour supprimer un article dans la bd
     */
    public function deletePost()
    {
    }

    /**
     * Function pour modifier un article dans la bd
     */
    public function updatePost()
    {
    }
}

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
    
        $reqSelect = 'SELECT p.id AS post_id, 
        p.title, p.introduction, p.createdAt, user.pseudo';
        $reqFrom = ' FROM post AS p INNER JOIN user';
        $reqOn = ' ON p.userId = user.id';
        $reqLimit = ' ORDER BY p.createdAt DESC LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqLimit);
        $req->execute();
        $posts=[];

        while ($data = $req->fetch())
        { 
            $posts[]= $data;
        }

        $req->closeCursor();
        return $posts;
    }
    
    /**
     * @function retreive a post with id
     * @param int $postId retreive one post
     * @return $post
     */
    public function getOneById($postId)
    {
        $db = $this->getDb();

        $postId = $_GET['id'];
        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM post INNER JOIN user';
        $reqOn = ' ON post.userId = user.id';
        $reqWhere = ' WHERE post.id = :postId';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqWhere);
        $req->bindParam(':postId', $postId, \PDO::PARAM_INT);
        $req->execute();
        $post=[];
        
        while($data = $req->fetch()){
            $post[] = $data;
        }
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

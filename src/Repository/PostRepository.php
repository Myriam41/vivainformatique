<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\Post;

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
    
        $req = $db->prepare('SELECT * FROM post ORDER BY createdAt DESC LIMIT 0, 10');
        $req->execute();
        $posts = [];

        while ($dataRaw = $req->fetch()) {
            $posts[] = new Post($dataRaw);
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

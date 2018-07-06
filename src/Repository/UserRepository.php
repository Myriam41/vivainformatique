<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\User;

/**
 * Class UerRepository extend Connect
 */

class UserRepository extends Connect
{
    /**
     * @function retreive author with userId
     * @return $author
     */

    public function getAuthor()
    {
        $db = $this->getDb();

        $userId = $_GET['userId'];

        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM post';
        $reqWhere = ' WHERE id = :userId';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $req->execute();
        
        $data = $req->fetch();
        $author = new User($data);

        $req->closeCursor();
        return $author;
    }
}
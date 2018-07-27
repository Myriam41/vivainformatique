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
     * @function check all users
     * @return $users
     */
    public function getAllUsers()
    {
        $db = $this->getDb();

        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM user';
        $reqWhere = ' ORDER BY createdAt DESC';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->execute();
        $users = [];
        
        while($data = $req->fetch()){
            $users[] = $data;
        }

        $req->closeCursor();
        return $users;
    }

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
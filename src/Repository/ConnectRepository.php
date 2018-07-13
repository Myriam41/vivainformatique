<?php

namespace App\Repository;

use App\Model\Connect;

/**
 * Class ConnectRepository extend Connect
 *
 */

class ConnectRepository extends Log
{
    /**
     * function New user INSERT
     */
    public function newUser()
    {
    $db = $this->getDb();

    $reqInsert = 'INSERT INTO user(name, password, createdAt, email)' ;
    $reqValues = 'VALUES(:name, :password, :createdAt, :email)';
    $req = $db->prepare($reqInsert . $reqValues);
    $req->execute(array(
        'name' => $name,
        'password' => $pass_hache,
        'email' => $email));
}
    /**
     * function SELECT user
     */
    public function getUser()
    {
    $db = $this->getDb();

    $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');

    $req->execute(array(

    'pseudo' => $pseudo));

    $resultat = $req->fetch();
    
    }
}
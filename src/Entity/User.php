<?php

namespace App\Entity;

/**
 * Class User
 */

class User
{
    /**
     * @var int primary key auto incremented
     */
    private $id;

    /**
     * @var string username
     */
    private $name;

    /**
     * @var string user's password
     */
    private $password;

    /**
     * @var string user's statut
     */
    private $statut;

    /**
     * @var string user's inscription date
     */
    private $createdAt;

    /**
     * @var string user's email
     */
    private $email;

        /**
     * @var string user's phone
     */
    private $phone;

    /**
     * @param string $data use function hydrate
     */
    public function __construct($data)
    {
        if (isset($data))
        {
            $this->hydrate($data);
        }
    }

    /**
     * @param string $data hydrate attributs with data
     */
    public function hydrate($data)
    {
    
        /**
         * if $data is an array. The value of each column is retrieved
         */
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
             
            if (isset($data['name'])) {
                $this->setTName($data['name']);
            }
            
            if (isset($data['password'])) {
                $this->setPassword($data['password']);
            }

            if (isset($data['statut'])) {
                $this->setStatut($data['statut']);
            }

            if (isset($data['email'])) {
                $this->setemail($data['email']);
            }

            if (isset($data['createdAt'])) {
                $this->setCreatedAt($data['createdAt']);
            }

            if (isset($data['phone'])) {
                $this->setPhone(['phone']);
            }
        }
    }

    /**
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
    * @return string name
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
    * @return string statut
    */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return string password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int createAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createAt = $createdAt;
    }

    /**
    * @return string email
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
        /**
    * @return string phone
    */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
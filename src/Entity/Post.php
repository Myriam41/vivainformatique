<?php

namespace App\Entity;

/**
 * Class Post
 */

class Post
{
    /**
     * @var int primary key auto incremented
     */
    private $id;

    /**
     * @var string post's title
     */
    private $title;

    /**
     * @var string post's introduction
     */
    private $introduction;

    /**
     * @var string post's content
     */
    private $content;

    /**
     * @var string post's author
     */
    private $author;

    /**
     * @var int post's creation date
     */
    private $createdAt;

    /**
     * @var int post's update date
     */
    private $updateAt;

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
                /**
                 * hydration id
                 */
                $this->setId($data['id']);
            }
             
            if (isset($data['title'])) {
                /**
                 * hydration title
                 */
                $this->setTitle($data['title']);
            }
            
            if (isset($data['content'])) {
                /**
                 * hydration content
                 */
                $this->setContent($data['content']);
            }

            if (isset($data['author'])) {
                /**
                 * hydration author
                 */
                $this->setAuthor($data['author']);
            }

            if (isset($data['introduction'])) {
                /**
                * hydration introduction
                */
                $this->setIntroduction($data['introduction']);
            }

            if (isset($data['createdAt'])) {
                /**
                * hydration createdAt
                */
                $this->setCreatedAt($data['createdAt']);
            }

            if (isset($data['updateAt'])) {
                // hydration UpdateAt
                $this->setUpdateAt(['updateAt']);
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
    * @return string title
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
    * @return string introduction
    */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * @param string $introduction
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

    /**
     * @return string content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return int createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
    * @return int updateAt
    */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param int $updateAt
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }
}
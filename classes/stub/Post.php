<?php

/**
 * Class Post stub
 * author: AQM Saiful Islam
 */
class Post {
    private $_postId = null;
    private $_postTitle = null;
    private $_postEmail = null;
    private $_postDescription = null;
    private $_postTime;
    private $_commentCount = 0;

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->_postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->_postId = $postId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostTitle()
    {
        return trim($this->_postTitle);
    }

    /**
     * @param mixed $postTitle
     */
    public function setPostTitle($postTitle)
    {
        $this->_postTitle = $postTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostDescription()
    {
        return trim($this->_postDescription);
    }

    /**
     * @param mixed $postDescription
     */
    public function setPostDescription($postDescription)
    {
        $this->_postDescription = $postDescription;
        return $this;
    }

    /**
     * @param $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    public  function getShortPostDescription($length = PHP_INT_MAX, $suffix = '...')
    {
        $text = html_entity_decode($this->getPostDescription());
        if (mb_strlen($text, 'UTF-8') > $length) {
            $text = mb_substr($text, 0, $length, 'UTF-8') . $suffix;
        }

        return $text;
    }

    /**
     * @return mixed
     */
    public function getPostTime()
    {
        return $this->_postTime;
    }

    /**
     * @param mixed $postTime
     */
    public function setPostTime($postTime)
    {
        $this->_postTime = $postTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentCount()
    {
        return $this->_commentCount;
    }

    /**
     * @param mixed $commentCount
     */
    public function setCommentCount($commentCount)
    {
        $this->_commentCount = $commentCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostEmail()
    {
        return $this->_postEmail;
    }

    /**
     * @param mixed $postEmail
     */
    public function setPostEmail($postEmail)
    {
        $this->_postEmail = $postEmail;
        return $this;
    }

    /**
     * Validate current input
     * @return bool
     */
    public function validate()
    {
        if (null === $this->getPostTitle() ||
            null === $this->getPostEmail() ||
            null === $this->getPostDescription()) {
            return false;
        }
        return true;
    }

}
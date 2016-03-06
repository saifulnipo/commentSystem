<?php

/**
 * Class Comment stub
 * author: AQM Saiful Islam
 */
class Comment {

    private $_comment_id = null;
    private $_commenterName = null;
    private $_commenterEmail = null;
    private $_commentDescription = null;
    private $_commentTime;
    private $_commentOnPostId = null;

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->_comment_id;
    }

    /**
     * @param mixed $comment_id
     */
    public function setCommentId($comment_id)
    {
        $this->_comment_id = $comment_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommenterName()
    {
        return trim($this->_commenterName);
    }

    /**
     * @param mixed $commenterName
     */
    public function setCommenterName($commenterName)
    {
        $this->_commenterName = $commenterName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommenterEmail()
    {
        return $this->_commenterEmail;
    }

    /**
     * @param mixed $commenterEmail
     */
    public function setCommenterEmail($commenterEmail)
    {
        $this->_commenterEmail = $commenterEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentDescription()
    {
        return trim($this->_commentDescription);
    }

    /**
     * @param mixed $commentDescription
     */
    public function setCommentDescription($commentDescription)
    {
        $this->_commentDescription = $commentDescription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentTime()
    {
        return $this->_commentTime;
    }

    /**
     * @param mixed $commentTime
     */
    public function setCommentTime($commentTime)
    {
        $this->_commentTime = $commentTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentOnPostId()
    {
        return $this->_commentOnPostId;
    }

    /**
     * @param mixed $commentOnPostId
     */
    public function setCommentOnPostId($commentOnPostId)
    {
        $this->_commentOnPostId = $commentOnPostId;
        return $this;
    }

    /**
     * Validate current input
     * @return bool
     */
    public function validate()
    {
        if (null === $this->getCommentOnPostId() ||
            null === $this->getCommenterEmail() ||
            null === $this->getCommentDescription()) {
            return false;
        }
        return true;
    }
}
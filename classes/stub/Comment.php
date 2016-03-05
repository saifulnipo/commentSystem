<?php

/**
 * Class Comment
 */
class Comment {

    private $_comment_id;
    private $_commenterName;
    private $_commenterEmail;
    private $_commentDescription;
    private $_commentTime;
    private $_commentOnPostId;

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
        return $this->_commenterName;
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
        return $this->_commentDescription;
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
}
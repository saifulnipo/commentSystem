<?php

/**
 * Class Posts
 * @author : AQM Saiful Islam
 */
class Comments {

    /**
     * Return All comments of a post id
     * @param $postId
     * @return array
     */
    public function getAllCommentsOfPost($postId)
    {
        $comments = array();
        try {
            $db = new Database();
            $query = sprintf('Select * from %s where post_id_fk = %d order by comment_time desc', IDbTables::COMMENTS, $postId);
            $results = $db->select($query);
            foreach ($results as $result) {
                $comment = (new Comment)
                    ->setCommentId($result['comment_Id'])
                    ->setCommenterName($result['comment_name'])
                    ->setCommenterEmail($result['comment_email'])
                    ->setCommentDescription($result['comment_description'])
                    ->setCommentTime($result['comment_time'])
                    ->setCommentOnPostId($result['post_id_fk']);
                $comments[] = $comment;
            }
        } catch (\PDOException $e) {

        }

        return $comments;
    }

    /**
     * Create a new comment
     *
     * @param Comment $comment
     * @return bool
     */
    public function createComment(Comment $comment)
    {
        $result = false;
        try {
            $db = new Database();
            $sql = sprintf(
                'INSERT INTO %s (comment_name, comment_email, comment_description, comment_time, post_id_fk)
                  VALUES ("%s", "%s", "%s", now(), %d);',
                IDbTables::COMMENTS,
                $comment->getCommenterName(),
                $comment->getCommenterEmail(),
                $comment->getCommentDescription(),
                $comment->getCommentOnPostId()
            );
            $result = $db->write($sql);

        } catch (\PDOException $e) {
            $result = false;
        }
        return $result;
    }

    /**
     * Delete a Comment
     *
     * @param $commentId
     * @return bool
     */
    public function deleteComment($commentId)
    {
        $result = false;
        try {
            $db = new Database();
            $sql = sprintf('DELETE FROM %s WHERE comment_Id = "%s"', IDbTables::COMMENTS, $commentId);
            $result = $db->write($sql);

        } catch (\PDOException $e) {
            return false;
        }
        return $result;
    }
}
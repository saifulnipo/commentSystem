<?php
/**
 * Class Posts
 */
class Posts {

    /**
     * Return all the posts
     *
     * @return array
     */
    public function getAllPosts()
    {
        $posts = array();
        try {
            $db = new Database();
            $query = sprintf(
                'SELECT post_Id, post_title, post_description, post_time, COUNT(comment_Id) AS comment_count
                 FROM %s
                 LEFT JOIN %s ON post_id = post_id_fk
                 GROUP BY post_id ORDER BY post_time DESC', IDbTables::POSTS, IDbTables::COMMENTS
            );
            $results = $db->select($query);

            foreach ($results as $result) {
                $post = (new Post)
                    ->setPostId($result['post_Id'])
                    ->setPostTitle($result['post_title'])
                    ->setPostDescription($result['post_description'])
                    ->setPostTime($result['post_time'])
                    ->setCommentCount($result['comment_count']);
                $posts[] = $post;
            }
        } catch (\PDOException $e) {

        }

        return $posts;
    }

    /**
     * Return details of a post
     *
     * @param $postId
     * @return null|Post
     */
    public function getPostDetails($postId)
    {
        try {
            $db = new Database();
            $query = sprintf('Select * from %s where post_Id = %d', IDbTables::POSTS, $postId);
            $result = $db->select($query);

            if (false === $result) {
                return null;
            }
            $result = $result[0];
            $post = new Post();
            $post->setPostId($result['post_Id'])
                ->setPostTitle($result['post_title'])
                ->setPostEmail($result['post_email'])
                ->setPostDescription($result['post_description'])
                ->setPostTime($result['post_time']);
        } catch (\PDOException $e) {
            return null;
        }
        return $post;
    }

    /**
     * Update a post
     *
     * @param $post
     * @return bool
     */
    public function updatePost($post)
    {
        $result = false;
        try {
            $db = new Database();
            $sql = sprintf(
                'UPDATE TABLE %s SET post_title = "%s", post_email = "%s", post_description = "%s", post_time = now()
                 WHERE post_Id="%s"',
                IDbTables::POSTS,
                $post->getPostTitle(),
                $post->getPostEmail(),
                $post->getPostDescription(),
                $post->getPostId()
            );
            $result = $db->write($sql);

        } catch (\PDOException $e) {
            return false;
        }
        return $result;

    }

    /**
     * Delete a post
     *
     * @param $postId
     * @return bool
     */
    public function deletePost($postId)
    {
        $result = false;
        try {
            $db = new Database();
            $sql = sprintf('DELETE FROM %s WHERE post_id = "%s"', IDbTables::POSTS, $postId);
            $result = $db->write($sql);

        } catch (\PDOException $e) {
            return false;
        }
        return $result;
    }

    /**
     * Create a new post
     *
     * @param Post $post
     * @return bool
     */
    public function createPost(Post $post)
    {
        $result = false;
        try {
            $db = new Database();
            $sql = sprintf(
                'INSERT INTO %s (post_title, post_email, post_description, post_time)
                  VALUES("%s", "%s", "%s", now())',
                IDbTables::POSTS,
                $post->getPostTitle(),
                $post->getPostEmail(),
                $post->getPostDescription()
                );
            $result = $db->write($sql);

        } catch (\PDOException $e) {
            $result = false;
        }
        return $result;
    }

}
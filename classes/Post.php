<?php


class Post extends DbConnections
{

    public function store($data)
    {
        $query = $this->connect()->prepare('INSERT INTO posts SET title=:title, body=:body, user_id=:user_id, created_at=:created_at, updated_at=:updated_at');
        $timestamp = date('Y-m-d H:i:s');

        $query->execute([
            ':title' => $data['title'],
            ':body' => $data['body'],
            ':user_id' => $data['user_id'],
            ':created_at' => $timestamp,
            ':updated_at' => $timestamp,
        ]);

        return $this->connect()->lastInsertId();
    }

    public function getPostsApi()
    {
        $posts = Api::getApiData('posts');
        $this->importPosts($posts);
    }

    public function getPosts()
    {
        $post = $this->connect()->prepare('SELECT * FROM posts');
        $post->execute();
        return $post->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchById($id)
    {
        $post = $this->connect()->prepare('SELECT * FROM posts WHERE id=:id LIMIT 1');
        $post->execute(['id' => $id]);

        $result = $post->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return $result[0];
        }
        return null;
    }

    public function searchByUserId($id)
    {
        $posts = $this->connect()->prepare('SELECT * FROM posts WHERE user_id=:id');
        $posts->execute(['id' => $id]);

        $results = $posts->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            return $results;
        }
        return null;
    }

    public function searchByContent($string)
    {

        $query = "SELECT * FROM posts WHERE title LIKE ? OR body LIKE ?";
        $params = ["%$string%", "%$string%"];
        $posts = $this->connect()->prepare($query);
        $posts->execute($params);

        $results = $posts->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }

    public function importPosts($posts)
    {

        $filterData = array_map(function ($val) {
            return [
                'title' => $val->title,
                'body' => $val->body,
                'user_id' => $val->userId,
            ];
        }, $posts);

        $stmt = $this->connect()->prepare('INSERT INTO posts SET title=:title, body=:body,user_id=:user_id, created_at=:created_at, updated_at=:updated_at');

        foreach ($filterData as $data) {

            $timestamp = date('Y-m-d H:i:s');
            $stmt->execute([
                ':title' => $data['title'],
                ':body' => $data['body'],
                ':user_id' => $data['user_id'],
                ':created_at' => $timestamp,
                ':updated_at' => $timestamp,
            ]);

        }

    }

    public function getAvg()
    {
        $sql = '';
        $posts = $this->connect()->prepare($sql);
        $posts->execute();
        return $posts->fetchAll(PDO::FETCH_ASSOC);
    }
}